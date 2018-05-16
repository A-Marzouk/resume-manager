@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center registerBody">
        <div class="col-md-5">
            <div class="row">
                <h2 class="registerHeading">
                    Apply to Join our community of premium Freelancers
                </h2>
                <h4 class="registerMainText">
                    With 123 Workforce,  its easy & free to get full-time & part-time freelance work.
                </h4>
                <h4 class="registerMainText">
                    Sign up today to be connected with the world’s leading Digital Agencies & Companies that are currently hiring.
                </h4>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Freelancer Application') }}</div>

                <div class="card-body">
                    <!-- Display Errors  -->
                    <? foreach($errors->all() as $error):?>
                    <div class="form-group col-md-8">
                        <div class="alert alert-danger">{{$error}}</div>
                    </div>
                    <? endforeach;?>
                    <form method="POST" action="{{ route('freelancer.register.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-3 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-3 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>
                            <div class="col-md-8">
                                <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profession" class="col-md-3 col-form-label text-md-right">Profession</label>
                            <div class="col-md-8">
                                <select class="custom-select" id="profession" name="profession" required>

                                    <option value="" >-- Select --</option>
                                    <option value="Developer" >Developer</option>
                                    <option value="Designer" disabled>Designer</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{--<div class="col-md-4"></div>--}}
                            <div class="col-md-12 text-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="englishLevel"
                                           name="englishLevel" required>
                                    <label class="form-check-label" for="defaultCheck1">
                                        I confirm that I have a high enough level of English speaking and writing, to be
                                        able to effectively communicate with clients.
                                    </label>
                                    @if ($errors->has('englishLevel'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('englishLevel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary applyBtn">
                                    {{ __('Apply') }}
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
