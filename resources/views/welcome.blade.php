<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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

            .header-wa > a {
                color: #fff;
                font-weight: 900 !important;
                font-size: .9em;
                padding: 10px;
            }

            .header-wa > a:hover {
                color: #fff;
                padding: 10px;
                background-color: rgba(37, 36, 40, 0.5);
            }

            .brand-wa{
                background: rgba(255, 255, 255, 0.8);

                /* color: #fff; */
                padding: 0.5em;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="background:url({{ asset('img/main/startup.jpeg') }}) center; background-size: cover;">
            @if (Route::has('login'))
                <div class="top-right links header-wa">
                    @auth
                        <a href="{{ url('/profile') }}">Inicio</a>
                    @else
                        <a href="{{ route('form') }}">REGISTRE SU EMPRESA</a>
                        <a href="{{ route('login') }}">INICIAR SESIÓN</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">REGISTRARSE</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md brand-wa">
                    WARMI ARMY
                </div>
            </div>
        </div>
    </body>
</html>
