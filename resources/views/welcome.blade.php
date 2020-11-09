<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PosTick</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-size: cover;
                background-position: center center;
                background-image: url(https://www.itl.cat/pics/b/19/195433_postit-wallpaper.jpg);
                font-family: 'Dancing Script', cursive;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            .button-accueil {
                font-family: 'Satisfy', cursive;
                font-size: 20px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @section('background')
        @endsection
    </head>

    <body>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="@route('table')" class="button-accueil" style="color: wheat;">Mes tableaux</a>
                    @else
                        <a href="@route('login')"style="color: wheat;">{{ __('Login') }} </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"style="color: wheat;">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content " style="color: wheat;">
                <div class="title m-b-md">
                    PosTick
                </div>
            </div>
        </div>
    </body>
</html>
