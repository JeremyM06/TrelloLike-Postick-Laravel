<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PosTick</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-size: cover;
                background-position: center center;
                background-image: url(https://www.itl.cat/pics/b/19/195433_postit-wallpaper.jpg);
                font-family: 'Nunito', sans-serif;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
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
                        <a href="@route('table')" style="color: wheat;">Mes tableaux</a>
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
                {{-- <div class="links">
                    <a href="https://community.lebocal.academy/student">Community</a>
                    <a href="https://gitlab.lebocal.academy/">GitLab</a>
                    <a href="https://laravel-news.com">Laravel News</a>
                    <a href="https://stackoverflow.com/">Stackoverflow</a>
                    <a href="https://news.humancoders.com/">Veille info</a>
                    <a href="https://www.silicon.fr/actualites/projects/devops#">Veille info 2</a>
                    <a href="https://developer-tech.com/">News in English</a>
                    <a href="https://www.codingame.com/home">Code In Game</a>

            </div> --}}
        </div>

    </body>
</html>
