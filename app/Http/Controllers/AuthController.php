<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Hash, Session, Auth;

class AuthController extends Controller
{
      protected $redirectTo = RouteServiceProvider::HOME;


      public function performLogin(Request $request)
      {
        $request->validate([
          'username' => 'required',
          'password' => 'required',
        ]);

          $username = $request->input('username');
          $password = $request->input('password');

          $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                  return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
            }
          // return back()->with('error', 'Invalid password or inactivated account. Try again.');
          return redirect()->back()->withErrors(['Invalid password or inactivated account. Try again.']);

          // $user = User::where('active', 1)->where('username', $username)->first();
          //
          // if ($user == null) {
          //     return redirect('login')->with('error', 'Invalid password or inactivated account. Try again.');
          // }
          //
          // $correct_password = Hash::check($password, $user->password);
          //
          // if (!$correct_password) {
          //     return redirect('login')->with('error', 'Invalid password or inactivated account. Try again.');
          // }
          // else {
          //     $role = $user->role;
          //     $request->session()->put('username', $username);
          //     $request->session()->put('role', $role);
          //     return redirect()->route('index');
          // }
    }

    public function logout()
    {
      Session::flush();
      Auth::logout();

      return Redirect('login');
    }
}
