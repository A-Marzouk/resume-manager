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
                    <a class="nav-item nav-link customNavLink active" href="/freelancer">Freelancers</a>
                </ul>

                <!-- Right Side Of Navbar -->
                <li class="navbar-nav chatWithUsText">
                    <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                    <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                    <?else :?>
                    <a class="nav-item nav-link customNavLink" href="#chatOn" id="liveChat" style="color:#0290D8;">
                        <img src="/resumeApp/resources/views/customTheme/images/textsms_24px.png" alt="chat img" width="16px">
                        &nbsp; Chat with us!

                    </a>
                    <? endif;?>
                </li>
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-link loginBtn">
                            <a href="{{ route('freelancer.login') }}">{{ __('Log in') }}</a> <span style="color: #18A6DF;">/</span>
                            <a href="{{ route('freelancer.register') }}">{{ __('Join') }}</a>
                        </li>
                    @else
                        <li class="nav-link nav-item customNavLink">
                            <a style="color:#637280;" href="/freelancer">
                                {{auth()->user()->firstName}}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link nav-item nav-link customNavLink" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        <audio id="chatAudio" class="d-none">
            <source src="/resumeApp/resources/views/customTheme/sounds/slow-spring-board.mp3" type="audio/ogg">
            Your browser does not support the audio element.
        </audio>



    </div>

    @include('layouts.footer')

{{-- chat minimized --}}
<div class="chatMinimized d-none" id="chatMinBox">
    <a href="javascript:void(0)" class="row" id="chatMin">
        <div class="col-2 col-md-1 col-lg-2 chatImage">
            <span>
                <img src="/resumeApp/resources/views/customTheme/images/textsms_24px copy.png" width="16px">
            </span>
        </div>
        <div class="col-10 text">
            <span id="chatText">Chat with us!</span>
        </div>
    </a>
</div>

    {{-- Changes saved --}}
    <div class="changesSavedText d-none" id="changesSaved">
        <span class="alert alert-success">
            Changes saved
        </span>
    </div>

    {{-- Chat box --}}
    <div>
        <? if(!$admin):?>
            @include('includes.chat')
        <? endif;?>
    </div>
<script type="text/javascript" src="/resumeApp/public/js/app.js"></script>
<script src="/resumeApp/resources/views/customTheme/js/main.js"></script>
    <script>
        $(document).ready(function(){
            if ($("#sendMessage").length ){
                setTimeout(function(){
                    $('#messagesBox').animate({scrollTop: $("#messagesBox").offset().top}, 'slow');
                    }, 1000);
            }
            if ($("#chatLogs").length ){
                setTimeout(function(){
                    $('html,body').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                }, 1000);
            }

            if($('#chatBox').length){
                $("#liveChat").click(function(){
                    $("#chatBox").animate({right: '10px',bottom:'10px',opacity:'1'});
                    $("#chatBox").removeClass('d-none');
                    $('#chatBox').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                    $('#messagesBox').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                    // close the navbar
                    $('#navBarToggle').click();
                });

                $('#chatMin').on('click',function(){
                    $("#liveChat").click();
                    $('#chatMinBox').addClass('d-none');
                });

                $("#closeChat").click(function(){
                    $("#chatBox").animate({bottom: '-550px',opacity:'1'});
                    $("#chatBox").addClass('d-none');

                    // show the minimized version
                    $('#chatMinBox').removeClass('d-none');
                });

            }


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
