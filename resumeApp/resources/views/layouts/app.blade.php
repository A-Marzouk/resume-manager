<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>123 Workforce</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

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
            <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <a class="nav-item nav-link customNavLink active" href="/freelancer">Freelancers</a>
                    <? if(!$admin):?>
                        <a class="nav-item nav-link customNavLink" href="javascript:void(0)" id="liveChat" style="color:#0290D8;">Live-chat</a>
                    <? endif;?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-link loginBtn">
                            <a href="{{ route('freelancer.login') }}">{{ __('Log in') }}</a> <span style="color: #18A6DF;">/</span>
                            <a href="{{ route('freelancer.register') }}">{{ __('Join') }}</a>
                        </li>
                    @else
                        <li class="nav-link nav-item customNavLink">
                            <a style="color:#637280;" href="/freelancer">
                                {{auth()->user()->username}}
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
                        <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>

                            <li class="nav-link nav-item nav-link customNavLink">
                                <a href="{{route('admin.dashboard')}}" class="customNavLink">Admin-area</a>
                            </li>
                        <? endif;?>
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
    </div>

    {{-- Chat box --}}
    <div>
        <? if(!$admin):?>
        <div id="chatBox" class="col-md-3 col-12 col-lg-3 d-none">
            <div class="chatHeading">
                <div class="text btn-block">
                        <span style="padding-right: 5px;">
                            <img src="/resumeApp/resources/views/customTheme/images/textsms_24px copy.png" width="20px">
                        </span>
                    <span id="chatText">Chat with us</span>
                    <a href="javascript:void(0)" id="closeChat"> <img src="/resumeApp/resources/views/customTheme/images/Rectangle.png"
                                                                      width="15px"> </a>
                </div>
                <div class="secondText btn-block">
                    <div class="row">
                        <div style="padding-top: 8px;">
                            <img src="/resumeApp/resources/views/customTheme/images/logo123.png" width="36px">
                        </div>
                        <div class="">
                            <span style="color: #637280;font-family: Roboto;font-size: 12px;">We're Here to Help!</span><br/>
                            <span style="color: #00CE6B;font-family: Roboto;font-size: 12px;">online</span>
                        </div><hr>
                    </div>
                </div>
            </div>
            <div id="VueChat">
                <div class="container">
                    <div class="empty" v-if="messages.length === 1" style="padding-top:250px;">
                        <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                    </div>
                    <div class="empty" v-else-if="messages.length === 2" style="padding-top:250px;">
                        <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                    </div>
                    <div class="empty" v-else-if="messages.length === 3" style="padding-top:250px;">
                        <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                    </div>
                    <div class="empty" v-else-if="messages.length === 4" style="padding-top:250px;">
                        <div class="text-info text text-chat">Hi, how can I hep you ?</div>
                    </div>
                    <chat-log :messages="messages" style="padding-top:50px;"></chat-log>
                </div><br/>
                <div class="container">
                    {{-- v-on:messageSent means when the event is emited --}}
                    {{-- addMessage method should be defiened on the root scope not components--}}
                    <chat-composer v-on:messagesent="addMessage"></chat-composer>
                </div>
            </div>
        </div>
        <? endif;?>
    </div>
<script type="text/javascript" src="/resumeApp/public/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="/resumeApp/resources/views/customTheme/js/main.js"></script>
    <script>
        $(document).ready(function(){
            if ($("#sendMessage").length ){
                setTimeout(function(){
                    $('#chatBox').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
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
                    // close the navbar
                    $('#navBarToggle').click();
                });

                $("#closeChat").click(function(){
                    $("#chatBox").animate({bottom: '-550px',opacity:'1'});
                    $("#chatBox").addClass('d-none');
                });
            }


            $('#navBarToggle').on('click',function () {
                if($('.collapse.navbar-collapse').hasClass('show')){
                    setTimeout(function(){
                        $('.collapse.navbar-collapse').removeClass('show');
                        $('#carouselExampleIndicators').show('slow');
                        }, 615);
                }
                $('#carouselExampleIndicators').hide('slow');
            });

        });
    </script>

{{-- jquery mobile for carousel --}}
<script src="resumeApp/resources/views/customTheme/js/jquery.mobile.custom.min.js"></script>
<script>
    $(document).on('pageinit', function(event){
        $("#carouselExampleIndicators").swiperight(function() {
            alert('prev');
            $(this).carousel('prev');
        });
        $("#carouselExampleIndicators").swipeleft(function() {
            alert('next');
            $(this).carousel('next');
        });
    });
</script>
</body>
</html>
