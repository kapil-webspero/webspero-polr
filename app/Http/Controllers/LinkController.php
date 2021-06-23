<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FormatLinks;
use Auth;

class LinkController extends Controller
{
    use FormatLinks;

    public function performShorten(Request $request) {
          // if (env('SETTING_SHORTEN_PERMISSION') && !self::isLoggedIn()) {
          //     return redirect(route('index'))->with('error', 'You must be logged in to shorten links.');
          // }

          // Validate URL form data
          $this->validate($request, [
              'link-url' => 'required|url'
          ]);

          $long_url = $request->input('link-url');
          $custom_ending = $request->input('custom-ending');
          $is_secret = ($request->input('options') == "s" ? true : false);
          // $creator = session('username');
          $creator = Auth::user()->role ?? 'guest';
          $link_ip = $request->ip();

          try {
              $short_url = $this->createLink($long_url, $is_secret, $custom_ending, $link_ip, $creator);
          }
          catch (\Exception $e) {
              return self::renderError($e->getMessage());
          }

          return view('pages.shorten_result', ['short_url' => $short_url]);
  }
}
