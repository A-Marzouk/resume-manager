<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>123 Workforce - Browse themes</title>

    @include('layouts.includes.styles')
</head>
<body>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12" id="browse_resumes">
                <browse-resumes></browse-resumes>
            </div>
        </div>
    </div>

    @include('layouts.includes.scripts')
</body>
</html>