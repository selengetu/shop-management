<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Banana Fruit Store</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/banana.jpg') }}">

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div style="width:40%; margin:auto;">
                    <a href="/">
                        <img src="{{ asset('images/banana.jpg') }}" alt="" style="max-width: 100%; max-height: 100%;">
                    </a>
                </div>

                <div class="title m-b-md">
                   Холбоо барих
                </div>

                <div class="links">
                    <a>Banana Fruit Store<br>Altai khothon Banana store<br>Narnii Zam 20/20-1, 4th khoroo, Bayangol district,<br>Ulaanbaatar, Mongolia</a>
                    <br>
                    <br>
                    <a>email: banana@gmail.com</a>
                    <br>
                    <br>
                    <a>tel: +976-99064486</a>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>+976-99993411</a>
                </div>
            </div>
        </div>
    </body>
</html>
