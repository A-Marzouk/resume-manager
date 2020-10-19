@extends('layouts.app')

@section('content')

    <!-- Success Messages  -->
    @if(session()->has('successMessage'))
        <div style="padding-top: 20px;">
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        </div>
    @endif


    <div id="searchFreelancers">
        <search-freelancers></search-freelancers>
    </div>

@endsection