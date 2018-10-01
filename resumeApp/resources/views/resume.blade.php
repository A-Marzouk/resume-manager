@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
            $freelancer = $user1;
        ?>
        <!-- Success Messages  -->
        <div style="padding-top: 20px;">
            @if(session()->has('successMessage'))
                <div class="alert alert-success" id="successMessage">
                    {{ session()->get('successMessage') }}
                </div>
            @endif
        </div>

        {{-- error message --}}
        @if (session()->has('errorMessage'))
                <div class="alert alert-danger">
                        {{ session()->get('errorMessage') }}
                </div>
        @endif

        <div class="container">
            @include('freelancer_card')
        </div>

@endsection