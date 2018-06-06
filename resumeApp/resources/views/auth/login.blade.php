@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="customFormHeader">{{ __('Freelancer Log in') }}</div>

                <form method="POST" class="clientForm" action="{{ route('freelancer.login.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="formLabel">{{ __('Password') }}
                                    <a href="{{ route('password.request') }}">
                                        {{ __(' Forgot?') }}
                                    </a>
                                </label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="rememberText">Remember Me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="buttonMain text-cente">
                                    <button type="submit" class="col-md-12 hireBtn">
                                        {{ __('Login') }}
                                    </button>
                                    <div class="smallText"><span> <a href="/freelancer/register"> Register now!</a></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
