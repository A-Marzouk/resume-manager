<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>123 Workforce</title>
        <!-- Styles -->
        @include('layouts.includes.styles')

    </head>
    <body>
        @yield('content')
        <script type="text/javascript" src="/resumeApp/public/js/app.js"></script>
    </body>


</html>
