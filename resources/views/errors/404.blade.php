<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.5
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/favico-64x64.png') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('images/favico-64x64.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>404 NOT FOUND | {{ config('app.name', 'Laravel') }}</title>

    <!-- Main Styles for this app -->
    <link href="{{ asset('css/coreui-style.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="clearfix">
                    <h1 class="text-center display-1">404</h1>
                    <p class="display-5 text-center">The page you are looking for was not found.</p>
                    <p class="text-center"><a href="{{ route('home') }}">Go Back!</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('js/chart.min.js') }}"></script>


    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>