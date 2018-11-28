<?
    $errorType = 'client';
    if ($errors->has('email')){
        $errorType = $errors->first('type');
    }
    if(isset($page)){
        if($page == 'freelancerLogin'){
            $errorType = 'freelancer';
        }
        else if($page == 'affiliateLogin'){
            $errorType = 'affiliate';
        }
    }
?>
<div id="loginTabs">
    <ul class="nav nav-tabs row" role="tablist">
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center @if($errorType == 'freelancer')active @endif" href="#freelancerTab" role="tab" data-toggle="tab">
                Freelancer
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center @if($errorType == 'client')active @endif" href="#clientTab" role="tab" data-toggle="tab">
                Client
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center @if($errorType == 'affiliate')active @endif" href="#affiliateTab" role="tab" data-toggle="tab">
                Affiliate
            </a>
        </li>
    </ul>
</div>
<hr>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane  @if($errorType == 'freelancer')active @endif firstItem" id="freelancerTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(auth()->guard()->check())
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/freelancer">
                                <div>
                                    <img src="/resumeApp/resources/views/customTheme/images/user.png" height="100px">
                                </div>
                                {{auth()->guard()->user()->firstName}}
                            </a>
                        </div>
                    </div>
                @else
                    <div class="customFormHeader" style="padding-top: 8px;">{{ __('Freelancer Log in') }}</div>
                    <form method="POST" class="clientForm" action="{{ route('freelancer.login.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') && $errorType== 'freelancer'? ' is-invalid' : '' }}" name="email" value="@if($errorType == 'freelancer') {{ old('email') }} @endif" required autofocus>

                                    @if ($errors->has('email') && $errorType== 'freelancer')
                                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" class="formLabel forgotText">{{ __('Password') }}
                                        <a href="{{ route('password.request') }}">
                                            {{ __(' Forgot?') }}
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') && $errorType== 'freelancer'? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password') && $errorType== 'freelancer')
                                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="checkBoxText checkBoxContainer">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="rememberText">Remember Me</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="buttonMain text-center">
                                        <button type="submit" class="col-md-12 hireBtn">
                                            {{ __('Login') }}
                                        </button>
                                        <div class="smallText" style="background: none !important;">
                                            <a href="{{route('freelancer.register')}}" style="background: none !important;"> Register now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane @if($errorType == 'client')active @endif firstItem" id="clientTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(auth()->guard('client')->check())
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/client">
                                <div>
                                    <img src="/resumeApp/resources/views/customTheme/images/user.png" height="100px">
                                </div>
                                {{auth()->guard('client')->user()->name}}
                            </a>
                        </div>
                    </div>
                @else
                    <div class="customFormHeader" style="padding-top: 8px;">{{ __('Client Log in') }}</div>
                    <div>
                        <form method="POST" class="clientForm" action="{{ route('client.login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') && $errorType== 'client' ? ' is-invalid' : '' }}" name="email" value="@if($errorType == 'client') {{ old('email') }} @endif" required autofocus>

                                            @if ($errors->has('email')&& $errorType== 'client')
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="formLabel forgotText">{{ __('Password ') }}
                                            <a href="{{ route('client.password.reset') }}">
                                                {{ __(' Forgot?') }}
                                            </a>
                                        </label>


                                        <div>
                                            <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') && $errorType== 'client'? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password') && $errorType== 'client')
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="checkBoxText form-check-label checkBoxContainer">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="buttonMain text-cente">
                                            <button type="submit" class="col-md-12 hireBtn">
                                                {{ __('Login') }}
                                            </button>
                                            <div class="smallText" style="background: none !important;">
                                                    <span style="background: none !important;">
                                                        <a href="/client/register" style="background: none !important;"> Register now!</a>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane @if($errorType == 'affiliate')active @endif firstItem" id="affiliateTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(auth()->guard('affiliate')->check())
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-12 text-center NoDecor">
                            <a style="color:#18A6DF;" href="/affiliate/dashboard">
                                <div>
                                    <img src="/resumeApp/resources/views/customTheme/images/user.png" height="100px">
                                </div>
                                {{auth()->guard('affiliate')->user()->name}}
                            </a>
                        </div>
                    </div>
                @else
                    <div class="customFormHeader" style="padding-top: 8px;">{{ __('Affiliate Log in') }}</div>
                    <div>
                        <form method="POST" class="clientForm" action="{{ route('affiliate.login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email')&& $errorType== 'affiliate' ? ' is-invalid' : '' }}" name="email" value="@if($errorType == 'affiliate') {{ old('email') }} @endif" required autofocus>

                                            @if ($errors->has('email') && $errorType== 'affiliate')
                                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="formLabel forgotText">{{ __('Password ') }}
                                            <a href="{{ route('affiliate.password.reset') }}">
                                                {{ __(' Forgot?') }}
                                            </a>
                                        </label>


                                        <div>
                                            <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') && $errorType== 'affiliate' ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password') && $errorType== 'affiliate')
                                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="checkBoxText form-check-label checkBoxContainer">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="buttonMain text-cente">
                                            <button type="submit" class="col-md-12 hireBtn">
                                                {{ __('Login') }}
                                            </button>
                                            <div class="smallText" style="background: none !important;">
                                                <span style="background: none !important;">
                                                    <a href="/affiliate/register" style="background: none !important;"> Register now!</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>