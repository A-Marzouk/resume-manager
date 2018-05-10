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
<body>
    <div class="container">
        <a href="{{route('admin')}}" class="btn btn-info">Users</a>
        <a href="{{route('client.login')}}" class="btn btn-primary">Clients</a>
    </div>
</body>
</html>