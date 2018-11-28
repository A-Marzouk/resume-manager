@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center registerBody">
                <div class="customFormHeader">
                    Apply to Join our community of premium Freelancers
                </div>
                <div class="pageSubHeading">
                    With 123 Workforce,  its easy & free to get full-time & part-time freelance work.<br/>
                    Sign up today to be connected with the world’s leading Digital Agencies & Companies that are currently hiring.
                </div>

                <form method="POST" action="{{ route('freelancer.register.submit') }}" class="clientForm">
                        @csrf
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="formLabel">{{ __('First Name') }}</label>
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
                                        <label for="lastName" class="formLabel">{{ __('Last Name') }}</label>
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
                                        <label for="email" class="formLabel">{{ __('Email') }}</label>

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
                                            <label for="profession" class="formLabel">Profession</label>
                                            <select class="custom-select" style="height: 50px;" id="profession" name="profession" required>

                                                <option value="" >-- Select --</option>
                                                <option value="Developer" >Developer
                                                    (Front-end / Back-end / Full-Stack / Javascript / Wordpress / PHP )
                                                </option>
                                                <option value="Designer">Designer
                                                    (UX / UI / Illustrator / Art Director )
                                                </option>
                                                <option value="businessSupport">Business Support
                                                    (sales telesales / administrator / email marketing / recruiting)
                                                </option>

                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="formLabel">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="panelFormInput form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm" class="formLabel">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="panelFormInput form-control " name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    <div>
                                        <label class="checkBoxText checkBoxContainer" for="englishLevel">
                                            <input type="checkbox" value="true" id="englishLevel"
                                                   name="englishLevel" required>
                                            <span class="rememberText">
                                            I confirm that I have high enough level of English speaking and writing, to be
                                            able to effectively communicate with clients.
                                            </span>
                                            <span class="checkmark"></span>
                                        </label>
                                        @if ($errors->has('englishLevel'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('englishLevel') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="form-group">
                        <div class="buttonMain text-center">
                            <button type="submit" class="col-md-5 hireBtn">
                                Register
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
    </div>
</div>
@endsection
