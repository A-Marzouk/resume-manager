@extends('layouts.affiliate-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="customFormHeader">{{ __('Affiliate Log in') }}</div>

                    <div>
                        <form method="POST" class="clientForm" action="{{ route('affiliate.login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
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
@endsection
