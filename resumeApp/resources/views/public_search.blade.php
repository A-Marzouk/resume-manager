@extends('layouts.client-app')

@section('content')

    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>

    <div class="container">
        @if(count($freelancers) >= 1)
        <div style="text-align: left; padding-bottom: 25px;">
            <div class="pageHeading">
                List of freelancers
            </div>
            <div class="pageSubHeading">
                {{$search_name}}
            </div>
        </div>
        @foreach($freelancers as $freelancer)
          @include('freelancer_card')
        @endforeach
        @else
            <div style="text-align: left; padding-bottom: 25px;">
                <div class="pageHeading">
                    Sorry, this search is empty
                </div>
                <div class="pageSubHeading" style="padding-bottom: 140px">
                    Please make sure you have the right link.
                </div>
            </div>
        @endif
    </div>
    <script>
        let stripe_buttons = document.getElementsByClassName("stripe-button-el");
        for (let i = 0; i < stripe_buttons.length; ++i) {
            let item = stripe_buttons[i];
            item.style.display = 'none';
        }
    </script>
@endsection