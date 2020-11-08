<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #eee;
            font-family: 'Noto Serif', serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-image: url("https://images.pexels.com/photos/5820029/pexels-photo-5820029.jpeg?cs=srgb&dl=pexels-maksim-goncharenok-5820029.jpg&fm=jpg");
            background-size: cover;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            margin-top: -30rem;
            text-align: center;
        }

        .title {
            font-size: 60px;
        }

        .links > a {
            color: #eee;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Sistema</a>
            @else
                <a href="{{ route('login') }}">Ingresar</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title">
            Bienvenido a la nube de Coco
        </div>
    </div>
</div>
</body>
</html>
