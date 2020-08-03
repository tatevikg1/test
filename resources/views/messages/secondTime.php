<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

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

            .center {
                position: absolute;
                left: 50%;
                top: 40%;
                transform: translate(-50%, -50%);
                text-align: center;
            }

            a{
                text-decoration: none;
                color:gray;
            }
        </style>
    </head>
    <body>
        <h1 class="center">
            <a  href="/">
                You can pass a test only once!
            </a>
        </h1>
    </body>
</html>
