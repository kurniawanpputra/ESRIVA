<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <title>ESRIVA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
            
            @keyframes animate{
                from{background-color: #fff;}
                to{background-color: #222d32;}
            }

            @keyframes animate-text{
                from{color: #636b6f;}
                to{color: #fff;}
            }

            .animate{
                animation: animate .5s linear;
                animation-fill-mode: forwards;
            }

            .animate-text{
                animation: animate-text .5s linear;
                animation-fill-mode: forwards;
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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="#about">Tentang Kami</a>
                    @auth
                        <a href="{{ url('/home') }}">Dasbor</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Daftar</a>
                        @endif -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <span style="letter-spacing: 5px;" class="landing-title">ESRIVA</span>
                </div>
            </div>
        </div>

        <div class="container full-height" id="about">
            <div class="row">
                <div class="col-md-6" style="padding: 10%;">
                    <img src="{{asset('img/landing.png')}}" style="max-width: 400px; width: 100%; height: auto; margin-top: 10%;">
                </div>

                <div class="col-md-6" style="padding: 10%;">
                    <h1 style="font-size: 36px; margin-top: 12.5%;" class="text-center">
                        APA ITU ESRIVA?
                    </h1>
                    
                    <p style="text-align: justify; margin-top: 25px; font-size: 16px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos minus consequatur cumque, eaque voluptate, tempora maxime nobis fugit numquam dolor, quia ducimus qui! Officia reprehenderit enim temporibus exercitationem, dolor accusamus. 
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos minus consequatur cumque, eaque voluptate, tempora maxime nobis fugit numquam dolor, quia ducimus qui! Officia reprehenderit enim temporibus exercitationem, dolor accusamus.
                    </p>
                </div>
            </div>
        </div>

        <script src="{{asset('js/baffle.js')}}"></script>
        <script src="{{asset('lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script>
            let b = baffle('.landing-title', {
                characters: '█▓█ ▓>█▒▓ ▒█░<█ █▒█ ▒▒<▓░ ▓/>< ▓█/ ░▒▒/ ▓/█▒',
                speed: 100
            });

            b.reveal(10000);

            $(document).ready(function () {
                setInterval(function(){
                    $("body").addClass('animate');
                    $("a").addClass('animate-text');
                    $(".landing-title").addClass('animate-text');
                }, 750);
            });
        </script>
    </body>
</html>
