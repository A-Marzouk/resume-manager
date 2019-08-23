<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>

  @include('layouts.includes.styles')
</head>
<body>
  
  <div id="freelancerResume">
    <freelancer-resume :freelancer="{{ json_encode(array(
      "id" => 1,
      "firstName" => "Jose Daniel",
      "lastName" => "Quintero",
      "projects" => array()
    )) }}"></freelancer-resume>
  </div>

  @include('layouts.includes.scripts')
</body>
</html>