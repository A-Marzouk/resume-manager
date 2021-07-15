<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Hire Top Freelance Designers & Scale your Creative Workforce with no overheads - Connecting companies with Top Freelance Designers.">
    <meta name="keywords" content="UI/UX, Motion Design, Graphic Design, Illustrator, Interaction">

    <title>Hire Talented Software Engineers | 123 Workforce</title>

    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,700&family=Noto+Sans:wght@400;700&display=swap"
            rel="stylesheet"
    />
    <!-- Styles -->
    @include('layouts.includes.styles')
</head>
<body style="margin: 0 !important;">

<div>
    <div id="loginForm">
        <login-form></login-form>
    </div>
</div>

@include('layouts.includes.scripts')


</body>
</html>
