<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $users = User::get();
        // $links = Link::get();
        $users = '';
        if ($request->session()->has('users')) {
            $users = session('users');
        }

        $links = Link::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('pages.dashboard', ['users' => $users, 'links' => $links]);
    }
}
