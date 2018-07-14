@extends('layouts.client-app')

@section('content')
    <div id="content" style="margin:auto;">
        <!-- Success Messages  -->
        @if(session()->has('successMessage'))
            <div class="alert alert-success col-md-4 offset-md-1 successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif


        @include('homepage_sections.main')
        @include('homepage_sections.freelancers')

        <div class="line"></div>

        @include('homepage_sections.talent')
        @include('homepage_sections.dev_boxes')
        @include('homepage_sections.our_clients')
    </div>
@endsection



