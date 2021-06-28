<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Link;
use App\Models\User;

class AuthController extends Controller
{
    function login(Request $request)
    {
        // print_r($request->all()); die();

        $apiUrl = env('API_URL');

        $response = Http::acceptJson()->post($apiUrl.'login', [
            // $request->all(),
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // print_r([$response->body(), $response->getStatusCode()]); die();
        if ($response->getStatusCode() == 200) {
          $user = json_decode($response)->user;
          $users = User::where(['username' =>  $user->username])->get();
          $links = Link::get();
          return view('pages.dashboard', ['users' => $users, 'links' => $links]);
            // return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        }


    }
}
