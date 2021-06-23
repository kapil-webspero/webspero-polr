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

        <!-- themekit admin template asstes -->
        <link rel="stylesheet" href="{{ asset('theme/all.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/dist/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    </head>

    <body>
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
                  <div class="text-center">
                    <h3>Shortened URL</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <input type='text' class='result-box form-control form-control-primary' value='{{$short_url}}' id='short_url' />
                                <div class="input-group-append">
                                    <button id='clipboard-copy' data-clipboard-target='#short_url' data-toggle='tooltip' data-placement='bottom' data-title='Copied!' class="btn btn-primary" ><i class='ik ik-clipboard'  aria-hidden='true' title='Copy to clipboard'></i></button>
                                </div>
                            </div>
                            <a id="generate-qr-code" class='btn btn-primary'>Generate QR Code</a>
                            <a href='/' class='btn btn-info'>Shorten another</a>
                        </div>
                        <div class="col-sm-12 mt-10">
                          <div class="qr-code-container" ></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		        <div class="col-md-12 m-5 mt-0 text-center">
		            <h6>Hello <span class="text-danger">Artisan</span>,</h6>
		            <h1 class="m-5">This is your homepage!</h1>
		            <a href="{{url('login')}}" class="btn btn-success">Go to Admin</a>
		            <a href="http://radmin.rakibhstu.com/docs/" class="btn btn-primary">Docs</a>
		            <a href="https://documenter.getpostman.com/view/11223504/Szmh1vqc?version=latest" class="btn btn-danger">API Endpoint</a>
		            <br>
		            <br>
		            <br>
		            <hr>
		        </div>

		        </div>
		    </div>
		</div>
		<script src="{{ asset('theme/all.js') }}"></script>
    <script src='js/qrcode.min.js'></script>
    <script src='js/clipboard.min.js'></script>
    <script src='js/shorten_result.js'></script>
    </body>
</html>
