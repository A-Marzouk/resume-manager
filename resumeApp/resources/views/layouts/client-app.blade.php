<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Become a client</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- faveicon --}}
    <link rel="shortcut icon" href="/resumeApp/resources/views/customTheme/images/logo123.png">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/resumeApp/resources/views/customTheme/css/main.css" rel="stylesheet" media="screen">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand col-md-3 col-9" href="{{ url('/') }}">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <a class="nav-item nav-link customNavLink " href="/">Homepage</a>
                    <a class="nav-item nav-link customNavLink active" href="/form/client/register/">Become a client</a>
                    <a class="nav-item nav-link customNavLink" href="#">Talk to sales</a>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard('client')->guest()): ?>
                        <li></li>
                        <li class="nav-link loginBtn">
                            <a href="{{ route('client.login') }}">{{ __('Log in') }}</a> <span style="color: #18A6DF;">/</span>
                            <a href="{{ route('client.register') }}">{{ __('Join') }}</a>
                        </li>
                    <? else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('client')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('client.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    <? endif;?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

{{-- footer --}}
<div class="customFooter">
    <div class="row">
        <div class="col-md-4 offset-md-1">
            <div class="footerText">
                © Copyright 2018 123Workforce.<br/>
                All Rights Reserved.
            </div>
        </div>
        <div class="col-md-2 text-center">
            <div class="footerImg">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/logo.png" alt="logo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="footerText text-right">
                info@123workforce.com<br>
                (+44) 2037000685<br/>
                <a href="https://www.facebook.com/123workforce">
                    <img src="/resumeApp/resources/views/customTheme/images/newResume/fb.png" alt="fb" width="25px">
                </a>
                <a href="https://www.instagram.com/123workforce/">
                    <img src="/resumeApp/resources/views/customTheme/images/newResume/instagram.png" alt="insta" width="25px">
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
