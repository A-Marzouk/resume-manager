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

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div id="record_input">
                        <record-input></record-input>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('business.apply.submit') }}" class="clientForm">


            </form>
        </div>
    </div>
@endsection
