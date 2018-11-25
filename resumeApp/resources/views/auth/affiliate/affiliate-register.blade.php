@extends('layouts.affiliate-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="customFormHeader">{{ __('Affiliate Register') }}</div>
                    <form method="POST" class="clientForm" action="{{ route('affiliate.register.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="formLabel">{{ __('Name') }}</label>
                                    <div>
                                        <input id="agency" type="text" class="panelFormInput form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Name --}}

                            <div class="col-md-12"> <div class="form-group">
                                    <label for="email2" class="formLabel">{{ __('E-Mail Address') }}</label>
                                    <div class="">
                                        <input id="email2" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- email --}}

                            <div class="col-md-12"> <div class="form-group">
                                    <label for="paypal_email" class="formLabel">{{ __('E-Mail Address') }}</label>
                                    <div class="">
                                        <input id="paypal_email" type="email" class="panelFormInput form-control{{ $errors->has('paypal_email') ? ' is-invalid' : '' }}" name="paypal_email" value="{{ old('paypal_email') }}" required>

                                        @if ($errors->has('paypal_email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('paypal_email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- email --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="formLabel">{{ __('Password') }}</label>
                                    <div class="">
                                        <input id="passwordModal" type="password" class="panelFormInput form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--pass--}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="formLabel">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="panelFormInput form-control" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                            {{-- pass confirm --}}

                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    <div>
                                        <label class="checkBoxText checkBoxContainer" for="agree_with_terms">
                                            <input type="checkbox" value="true" id="agree_with_terms"
                                                   name="agree_with_terms" required>

                                            <span class="rememberText">
                                                I agree with 123 Workforce
                                                <a href="{{route('terms')}}" target="_blank">
                                                    <span style="opacity: 1;">Terms & Conditions</span>
                                                </a>
                                            </span>

                                            <span class="checkmark"></span>
                                        </label>
                                        @if ($errors->has('agree_with_terms'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('agree_with_terms') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="buttonMain text-center" style="padding-top: 0;">
                                <button type="submit" class="col-md-5 hireBtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="smallText">Already have an account?<span> <a href="/affiliate/login"> Log in!</a></span></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection