<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@section('title'){{env('APP_NAME')}}@show</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('theme/favicon.png') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="{{ asset('theme/js/app.js') }}"></script>
        <link href="/css/toastr.min.css" rel="stylesheet">

        <!-- themekit admin template asstes -->
        <link rel="stylesheet" href="{{ asset('theme/all.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/dist/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    </head>

    <body>
      {{--
        @include('include.navbar')
        --}}
		<div class="container">
		    <div class="row justify-content-center">
		        <div class="col-md-12 m-5 text-center">
		        	<a href="http://rakibul.dev">
		            	<img height="40" src="{{ asset('theme/img/logo.png') }}">
		            </a>
		        </div>
            <div class="col-md-12 m-5">
              <div class="card">
                <div class="card-body">
                  <form method='POST' action='/shorten' role='form'>
                      @csrf
                      <div class="form-group">
                          <input type='url' autocomplete='off' name="link-url" class="form-control form-control-lg form-control-primary" placeholder="http://">
                      </div>
                      <div class="form-group text-center">
                          <input type="submit" class="btn btn-info" name="button" id="shorten" value="Shorten">
                          <button type="button" class="btn btn-warning" name="button" disabled> Link Options</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
		        <div class="col-md-12 m-5 mt-0 text-center">
		            <h6>Hello <span class="text-danger">Artisan</span>,</h6>
		            <h1 class="m-5">This is your homepage!</h1>
                <a href="{{ url('login') }}"class="btn btn-success">  <i class="ik ik-unlock"></i>{{ __('Login')}}</a>
                <a href="{{ url('signup') }}"class="btn btn-primary"><i class="ik ik-users"></i>{{ __('Registration')}}</a>
                <a href="{{url('admin-login')}}" class="btn btn-danger">Go to Admin</a>

                {{--
                  <a href="{{url('admin-login')}}" class="btn btn-success">Go to Admin</a>
                  <a href="http://radmin.rakibhstu.com/docs/" class="btn btn-primary">Docs</a>
                  <a href="https://documenter.getpostman.com/view/11223504/Szmh1vqc?version=latest" class="btn btn-danger">API Endpoint</a>
                  --}}
		            <br>
		            <br>
		            <br>
		            <hr>
		        </div>

		        </div>
		    </div>
		</div>
		<script src="{{ asset('theme/all.js') }}"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
        @if (Session::has('info'))
            toastr["info"](`{{ str_replace('`', '\`', session('info')) }}`, "Info")
        @endif
        @if (Session::has('error'))
            toastr["error"](`{{str_replace('`', '\`', session('error')) }}`, "Error")
        @endif
        @if (Session::has('warning'))
            toastr["warning"](`{{ str_replace('`', '\`', session('warning')) }}`, "Warning")
        @endif
        @if (Session::has('success'))
            toastr["success"](`{{ str_replace('`', '\`', session('success')) }}`, "Success")
        @endif

        @if (count($errors) > 0)
            // Handle Lumen validation errors
            @foreach ($errors->all() as $error)
                toastr["error"](`{{ str_replace('`', '\`', $error) }}`, "Error")
            @endforeach
        @endif
    </script>
    </body>
</html>
