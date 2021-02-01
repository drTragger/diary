<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 </title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="/css/style.css">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            background-color: #e6b333;
        }

        #notfound {
            position: relative;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 40%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            user-select: none;
        }

        .notfound {
            max-width: 410px;
            width: 100%;
            text-align: center;
        }

        .notfound .notfound-404 {
            height: 280px;
            position: relative;
            z-index: -1;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 230px;
            margin: 0px;
            font-weight: 900;
            position: absolute;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            background: url('https://xc-life.ru/wp-content/uploads/2019/11/zvezdnoe-nebo.jpg') no-repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: cover;
            background-position: center;
        }


        .notfound h2 {
            font-family: 'Montserrat', sans-serif;
            color: #000;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 0;
        }

        .notfound p {
            font-family: 'Montserrat', sans-serif;
            color: #000;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 20px;
            margin-top: 0px;
        }

        .notfound a {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            display: inline-block;
            padding: 15px 30px;
            border-radius: 40px;
            color: #fff;
            font-weight: 700;
        }


        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 142px;
            }
            .notfound .notfound-404 h1 {
                font-size: 112px;
            }
        }

    </style>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <header class="default-header ">
        <nav class="navbar navbar-expand-sm col-12">
            <div class="col-5">
                <a href="{{route('groups.index')}}"><img src="/images/logo.png" alt="Logo" title="To main the page"
                                                         class="rounded logo"></a>
            </div>
            <div class="col-5 text-center">
                <ul class="navbar-nav ">
                    <li><a href="{{route('groups.index')}}" class="nav-link text-dark"><h3 class="title">MKSK classroom</h3>
                        </a></li>
                </ul>
            </div>
        </nav>
    </header>

</head>

<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
        </div>
        <h2>404 - Page not found</h2>
        <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
        <button type="button" class="btn btn-dark"><a href="{{ url('/') }}">Go To Homepage</a></button>
    </div>
</div>

</body>
</html>