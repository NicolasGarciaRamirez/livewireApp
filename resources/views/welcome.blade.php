<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content= "width=device-width, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">        
        <title>Poke Api</title>
    </head>
    <body class="container-fluid">
        <div class="text-center">
            <h2>Poke Api</h2>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
