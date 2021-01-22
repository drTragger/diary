<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diary</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body class="default">
<header class="default-header">
    <nav class="default-nav d-flex justify-space-between align-items-center">
        <div class="d-flex justify-center">
            <a class="" href="{{ route('groups.index') }}">
                <img src="/images/logo.png" alt="Logo" class="logo" title="На главную">
            </a>
        </div>
        <div class="default-nav-account">
            <p><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</p>
            <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Log out</a>
        </div>
    </nav>
</header>
<main class="d-flex">
    <div class="left-content">
        <nav class="left-nav">
            <ul class="left-content-ul">
                <li>
                    <a href="{{route('groups.index')}}"
                       class="btn main-nav-a-btn">My groups
                    </a>
                </li>
                @yield('nav')
            </ul>
        </nav>
    </div>
    <div class="right-content d-flex flex-direction-row flex-wrap">
        @yield('content')
    </div>
</main>
<footer class="d-flex justify-center align-items-center">
    <div>
        <h4>
            &copy; junstudio 2020
        </h4>
    </div>
</footer>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
