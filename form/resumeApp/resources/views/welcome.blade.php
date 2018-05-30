<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="resumeApp/resources/views/customTheme/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <title>Welcome !</title>
</head>
<body style="padding-top: 10px;">
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1 class="display-3">Welcome to Resume manager!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('freelancer.dashboard')}}" role="button">Freelancers</a>
            <a class="btn btn-primary btn-lg" href="{{route('client.login')}}" role="button">Clients</a>
        </p>
    </div>
</div>

</body>
</html>