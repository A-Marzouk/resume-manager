@extends('layouts.client-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="customFormHeader">{{ __('Affiliate password reset') }}</div>

                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/affiliate/password/email') }}" class="clientForm">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="panelFormInput form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <div class="buttonMain text-cente">
                                    <button type="submit" class="col-md-8 hireBtn">
                                        {{ __('Send password reset link') }}
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
