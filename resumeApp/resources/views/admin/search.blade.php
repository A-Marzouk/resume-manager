@extends('layouts.app')

@section('content')

    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>

    <div id="searchFreelancers">
        <search-freelancers></search-freelancers>
    </div>

@endsection