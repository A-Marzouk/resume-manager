<div id="loginTabs">
    <ul class="nav nav-tabs row" role="tablist">
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center" href="#freelancerTab" role="tab" data-toggle="tab">
                Freelancer
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center active" href="#clientTab" role="tab" data-toggle="tab">
                Client
            </a>
        </li>
        <li class="nav-item customTab NoDecor col-4 text-center">
            <a class="text-center" href="#affiliateTab" role="tab" data-toggle="tab">
                Affiliate
            </a>
        </li>
    </ul>
</div>
<hr>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane firstItem" id="freelancerTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="customFormHeader" style="padding-top: 8px;">{{ __('Freelancer Log in') }}</div>

                    <form method="POST" class="clientForm" action="{{ route('freelancer.login.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
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
                                    <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
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
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane active firstItem" id="clientTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="customFormHeader" style="padding-top: 8px;">{{ __('Client Log in') }}</div>

                    <div>
                        <form method="POST" class="clientForm" action="{{ route('client.login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
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
                                            <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
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
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane firstItem" id="affiliateTab">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="customFormHeader" style="padding-top: 8px;">{{ __('Affiliate Log in') }}</div>
                <div>
                    <form method="POST" class="clientForm" action="{{ route('affiliate.login.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
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
                                        <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
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
            </div>
        </div>
    </div>
</div>