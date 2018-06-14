<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>123 Workforce</title>

    <!-- Scripts -->
    {{-- faveicon --}}
    <link rel="shortcut icon" href="/resumeApp/resources/views/customTheme/images/logo123.png">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/resumeApp/resources/views/customTheme/js/slick-master/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/resumeApp/resources/views/customTheme/js/slick-master/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/resumeApp/resources/views/customTheme/css/main.css" rel="stylesheet" media="screen">
</head>
<body>
<?
    $curPage = url()->current();
    if(strpos($curPage, 'client') !== false){
        $curPage = 'client';
    }else{
        $curPage = 'home';
    }
?>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
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
                    {{-- if guest : --}}
                    <? if(auth()->guard('client')->guest()):?>
                        <a class="nav-item nav-link customNavLink <?if($curPage == 'client'):?>active<?endif;?>" href="/client/register/" data-toggle="modal" data-target="#exampleModalCenter">Become a client</a>
                    <? endif; ?>
                    <a class="nav-item nav-link customNavLink" href="#" data-toggle="modal" data-target="#talkToSales">Talk to sales</a>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard('client')->guest()): ?>
                        <li></li>
                        <li class="nav-link loginBtn">
                            <a href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal">{{ __('Log in') }}</a> <span style="color: #18A6DF;">/</span>
                            <a href="{{ route('client.register') }}" data-toggle="modal" data-target="#exampleModalCenter">{{ __('Join') }}</a>
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
                                <? if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
                                <a href="{{route('admin.dashboard')}}" class="dropdown-item">Admin area</a>
                                <? endif;?>

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
                <a href="/freelancer/register">Join our team of freelancers</a><br/>
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
<!-- Modals -->
<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.5);" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        <div class="customFormHeader text-left" style="background: white;">{{ __('Client Register') }}</div>

                        <form method="POST" class="clientForm" action="{{ route('client.register.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="agency" class="formLabelModal">{{ __('Agency/Business name') }}</label>
                                        <div>
                                            <input id="agency" type="text" class="form-control{{ $errors->has('ageny') ? ' is-invalid' : '' }}" name="agency" value="{{ old('agency') }}" required autofocus>
                                            @if ($errors->has('agency'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('agency') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- Agency / Name --}}

                                    <div class="form-group">
                                        <label for="email" class="formLabelModal">{{ __('E-Mail Address') }}</label>
                                        <div class="">
                                            <input id="email2" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- email --}}



                                    <div class="form-group">
                                        <label for="phone" class="formLabelModal">{{ __('Phone') }}</label>

                                        <div class="">
                                            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--phone--}}


                                    <div class="form-group">
                                        <label for="password" class="formLabelModal">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="passwordModal" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--pass--}}

                                </div>
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="name" class="formLabelModal">{{ __('Contact person') }}</label>
                                        <div class="">
                                            <input id="nameModal" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- contact person --}}

                                    <div class="form-group">
                                        <label for="email" class="formLabelModal" style="font-size: 12px;">{{ __('E-Mail Address accounts dept') }}</label>

                                        <div>
                                            <input id="emailDept" type="email" class="form-control{{ $errors->has('emailDept') ? ' is-invalid' : '' }}" name="emailDept" value="{{ old('emailDept') }}" required>

                                            @if ($errors->has('emailDept'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('emailDept') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- email dept--}}

                                    <div class="form-group">
                                        <label for="timeZone" class="formLabelModal">{{ __('Time zone') }}</label>

                                        <div class="">
                                            <select class="form-control" id="timeZone" name="timeZone">
                                                <option value="" selected="selected">Select your timezone</option>
                                                <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                                <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                                <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                                <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                                <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                                <option value="">--------------</option>
                                                <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                                                <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                                                <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                                <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                                <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                                <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                                <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                                <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                                <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                                <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                                <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                                <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                                <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                                <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                                <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde Islands</option>
                                                <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                                <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South Africa</option>
                                                <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                                <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                                <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                                <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                                <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                                <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                                <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
                                                <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                                <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                                                <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                                <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                                <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                                <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                                <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                                <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                                <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                                <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                                <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                                <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                                <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                                                <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                                                <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands, Tokelau</option>
                                            </select>
                                            @if ($errors->has('timeZone'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('timeZone') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--time zone--}}


                                    <div class="form-group ">
                                        <label for="password-confirm" class="formLabelModal">{{ __('Confirm Password') }}</label>

                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- pass confirm --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="buttonMain text-center" style="padding-top: 0;">
                                    <button type="submit" class="col-md-5 hireBtn" style="padding: 3.5% 14% 3.5% 14%;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="smallText">Already have an account?<span> <a href="/client/login"> Log in!</a></span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
{{-- login modal --}}
<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.5);" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div class=>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="customFormHeader text-left" style="background: white;">{{ __('Client Log in') }}</div>
                        <div>
                            <form method="POST" class="clientForm" action="{{ route('client.login.submit') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="email" class="formLabelModal">{{ __('E-Mail Address') }}</label>

                                            <div class="">
                                                <input id="emailModal2" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="formLabelModal">{{ __('Password ') }}
                                                <a href="{{ route('password.request') }}">
                                                    {{ __(' Forgot?') }}
                                                </a>
                                            </label>


                                            <div>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <span class="rememberText">{{ __('Remember Me') }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="buttonMain text-cente">
                                                <button type="submit" class="col-md-12 hireBtn">
                                                    {{ __('Login') }}
                                                </button>
                                                <div class="smallText"><span> <a href="/client/login"> Register now!</a></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
{{-- Talk to sells modal --}}
<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.5);" id="talkToSales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="row">
        <div class="col-md-12 text-center" style="padding-top: 20px;">
            <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12">
                    <div class=>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="customFormHeader text-left" style="background: white;">{{ __('Talk to sales') }}</div>
                        <hr>
                        <div>
                            <form method="POST" class="clientForm" action="{{ route('message.to.sales') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="email" class="formLabelModal">{{ __('Your e-mail Address') }}</label>

                                            <div class="">
                                                <input id="emailModal" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="subject" class="formLabelModal">{{ __('Subject') }}</label>


                                            <div>
                                                <input id="subject" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="subject" required>

                                                @if ($errors->has('subject'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message" class="panelFormLabel">Message</label>
                                            <textarea class="form-control panelFormInput" rows="3" id="message" name="message" required>

                                            </textarea>
                                            @if ($errors->has('message'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="buttonMain text-cente">
                                                <button type="submit" class="col-md-12 hireBtn">
                                                    {{ __('Send') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"
        integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script type="text/javascript" src="/resumeApp/resources/views/customTheme/js/slick-master/slick/slick.min.js"></script>
<script type="text/javascript" src="/resumeApp/resources/views/customTheme/js/custom.js"></script>
<script>
    $(document).ready(function(){
        $('.slickSlide').slick({
            lazyLoad: 'ondemand',
            dots: true,
            arrows:false,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 478,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }
            ]
        });


    });

    function handler1() {
        $('img', this).attr('src','resumeApp/resources/views/customTheme/images/Circle-PNG-HD.png');
        $(this).one("click", handler2);
    }
    function handler2() {
        $('img', this).attr('src','resumeApp/resources/views/customTheme/images/img_143278 (2).png');
        $(this).one("click", handler1);
    }

    $(".designerBtn a").one("click", handler1);

</script>
</body>
</html>
