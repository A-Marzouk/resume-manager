@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="customFormHeader">{{ __('Reset password') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.password.request') }}" class="clientForm">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="formLabel">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="formLabel">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control panelFormInput" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="buttonMain text-cente">
                                    <button type="submit" class="col-md-12 hireBtn">
                                        {{ __('Reset password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
