<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Link;
use App\Models\User;

class AuthController extends Controller
{
    function login (Request $request)
    {
        $apiUrl = env('API_URL');

        $response = Http::acceptJson()->post($apiUrl.'login', [

            'username' => $request->username,
            'password' => $request->password,
        ]);

         try {
             if ($response->getStatusCode() == 200) {
                 $resp  = json_decode($response->body());

                 $user  = $resp->user;
                 $role  = $resp->type;
                 $accessToken = $resp->access_token;
                 $users = $resp->users;

                 $request->session()->put('user', $user);
                 $request->session()->put('role', $role);
                 $request->session()->put('access_token', $accessToken);
                 $request->session()->put('users', $users);

                 if ($role == 'admin') {
                    return \Redirect::route('admin.dashboard');
                 }
                 // return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
             } else {
                 $resp = json_decode($response->body());
                 return redirect()->back()->withErrors([$resp->message]);
             }
         } catch (\Exception $e) {

         }
    }

    function logout (Request $request)
    {
        $apiUrl = env('API_URL');

        if ($request->session()->has('access_token')) {
            $accessToken = session('access_token');

            $response = Http::withToken($accessToken)->get($apiUrl.'logout', [
              [
                'headers' => [
                  'Accept' => 'application/json'
                ]
              ]
            ]);

            if ($response->getStatusCode() == 200) {
              session()->flush();
              session()->forget('user');

              return \Redirect::route('api-login');
            }
        }

        return back();
    }

    function register (Request $request)
    {
        $apiUrl = env('API_URL');

        $response = Http::acceptJson()->post($apiUrl.'signup', [
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        if ($response->getStatusCode() == 200) {

            print_R($response->body()); die();
            return \Redirect::route('dashboard');
            // if ($role == 'admin') {
            //    return \Redirect::route('admin.dashboard');
            // }
            // return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        } else if ($response->getStatusCode() == 422) {
            $err = json_decode($response->body());

            return redirect()->back()->withInput()->withErrors($err->errors);
        }

    }
}
