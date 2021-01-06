@extends('layouts.my-app')

@section('content')

    <div class="notification-page-content">

        <div class="navbar">
            <a href="/">
                <img src="/images/new_homepage/logo.svg" alt="logo">
            </a>
        </div>

        <div class="notification">
            <div class="notification-image">
                <img src="/images/new_resume_builder/error-icon.svg" alt="error icon">
            </div>
            <div class="notification-message">
                We are sorry! your payment did not go through!<br/>
                Please check your credit card status or contact us for help.
            </div>
        </div>

    </div>

@endsection