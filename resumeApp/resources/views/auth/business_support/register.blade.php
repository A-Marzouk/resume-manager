@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center registerBody" style="margin-top: 0;">
            <div class="customFormHeader" style="padding-top: 0;">
                 Join our community of premium Telesales & Customer Service Professionals
            </div>
            <div class="pageSubHeading" style="padding-top: 15px;">
                With 123 Workforce,  its easy & free to get full-time & part-time work.<br/>
                Apply today to be connected with the world’s leading Companies that are currently hiring.
            </div>

            <form method="POST" action="{{ route('business.apply.submit') }}" class="clientForm">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="formLabel">{{ __('First Name *') }}</label>
                                    <input id="firstName" type="text" class="panelFormInput form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="formLabel">{{ __('Last Name *') }}</label>
                                    <input id="lastName" type="text" class="panelFormInput form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>
                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="formLabel">{{ __('Email *') }}</label>

                                    <input id="email" type="email" class="panelFormInput form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> <!-- email -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="formLabel">{{ __('Phone *') }}</label>

                                    <input id="phone" type="tel" class="panelFormInput form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp" class="formLabel">{{ __('Whatsapp') }}</label>
                                    <input id="whatsapp" type="text" class="panelFormInput form-control {{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" value="{{ old('whatsapp') }}" name="whatsapp">

                                    @if ($errors->has('whatsapp'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('whatsapp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skype" class="formLabel">{{ __('Skype') }}</label>
                                    <input id="skype" type="text" class="panelFormInput form-control {{ $errors->has('skype') ? ' is-invalid' : '' }} " value="{{ old('skype') }}" name="skype">

                                    @if ($errors->has('skype'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('skype') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-left panelFormLabel">
                              Please upload / record a short audio recording describing your previous experience in Customer service and
                                Sales ( Ideal recording length from 1 - 2 minutes )
                            </div>
                        </div>

                    </div>
                </div>




                <div class="form-group">
                    <div class="buttonMain text-center">
                        <button type="submit" class="col-md-5 hireBtn">
                           Apply
                        </button>
                    </div>
                    <div class="smallText">
                        Already have an account?
                        <span>
                        <a href="/freelancer/login"> Log in!</a>
                    </span>
                    </div>
                </div>
                @if(isset($ownerCode))
                    <input type="hidden" name="ownerCode" value="{{$ownerCode}}">
                @endif
            </form>
        </div>
    </div>
@endsection
