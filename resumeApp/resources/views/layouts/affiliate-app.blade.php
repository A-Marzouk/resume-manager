<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>123 Workforce</title>

    <link rel="shortcut icon" href="/resumeApp/resources/views/customTheme/images/logo123.png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/resumeApp/public/css/app.css" rel="stylesheet">
    <link href="/resumeApp/resources/views/customTheme/css/main.css" rel="stylesheet" media="screen">
    <link href="/resumeApp/resources/views/customTheme/css/freelancerForm.css" rel="stylesheet">

</head>
<body>

<?
$admin = false;
$user = auth()->user();
if($user){
    if($user->admin == 1){
        $admin = true;
    }
}
?>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <a class="navbar-brand col-md-3 col-9" href="{{ url('/') }}">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
        </a>

        <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="" style="border: none;" data-target="#" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url('/resumeApp/resources/views/customTheme/images/newResume/menu.png');"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
            </ul>

            <!-- Right Side Of Navbar -->
            <li class="navbar-nav chatWithUsText">
                <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                    <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                <? endif;?>
            </li>
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @if(auth()->guard('affiliate')->guest())
                    <li class="nav-link loginBtn">
                        <a href="{{ route('affiliate.login') }}" style="padding-left: 30px; padding-right: 30px;">{{ __('Log in') }}</a>
                    </li>
                @else
                    <li class="nav-link nav-item customNavLink NoDecor" style="color:#0290D8;">
                        <a style="color:#637280;" href="/affiliate/dashboard">
                            {{auth()->guard('affiliate')->user()->name}}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link nav-item  customNavLink" href="{{ route('affiliate.logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('affiliate.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('layouts.footer')

{{-- Changes saved --}}
<div class="changesSavedText d-none" id="changesSaved">
        <span class="alert alert-success">
            Changes saved
        </span>
</div>
{{-- Copied --}}
<div class="changesSavedText d-none" id="copied">
        <span class="alert alert-success">
            Copied
        </span>
</div>


<script type="text/javascript" src="/resumeApp/public/js/app.js"></script>
<script src="/resumeApp/resources/views/customTheme/js/main.js"></script>
<script>
    $(document).ready(function(){
        $('#navBarToggle').on('click',function () {
            if($('.collapse.navbar-collapse').hasClass('show')){
                $('.collapse.navbar-collapse').removeClass('show');
                $('#tabsMobile').show('slow');
            }else{
                $('.collapse.navbar-collapse').addClass('show');
                $('#tabsMobile').hide('slow');
            }
        });

    });
</script>
</body>
</html>
