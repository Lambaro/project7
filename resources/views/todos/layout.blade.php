<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Todos</title>
</head>
<body>

<div class="text-center pt-5 d-flex justify-content-center">
    <div class="w-50 border border-dark rounded py-4">
        @yield('content')
    </div>

</div>

</body>
</html>
