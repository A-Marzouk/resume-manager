<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>123 Workforce</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8sscirCZTTic3ss2ojTeohyajgHtg7sI&libraries=places"></script>
    @include('layouts.includes.styles')
</head>
<body id="dashboard" class="dashboard">

    @yield('content')

    @include('layouts.footer')
    @include('layouts.includes.scripts')

    <script type="text/javascript">
        function initialize() {
            var input = document.getElementById('city');
            new google.maps.places.Autocomplete(input);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</body>
</html>
