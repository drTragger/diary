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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--our styles-->
    <link rel="stylesheet" href="/css/style.css">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body>
<header class="default-header ">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-sm col-12">
        <div class="col-5">
            <!--Logo-->
            <a href="{{route('groups.index')}}"><img src="/images/logo.png" alt="Logo" title="To main the page"
                                                     class="rounded logo"></a>
        </div>
        <div class="col-6 text-center">
            <!--Category-->
            <ul class="navbar-nav ">
                <li><a href="{{route('groups.index')}}" class="nav-link text-dark"><h3 class="title">MKSK classroom</h3></a></li>
            </ul>
        </div>
        <div class="col-1">
            <!--User-->
            <p title="It is you"><i class="fa fa-user-circle" aria-hidden="true"></i>: {{ Auth::user()->name }} </p>
            <a href="{{ url('/logout') }}"><i class="fa fa-times" aria-hidden="true"></i> Logout</a>
        </div>
    </nav>
</header>
<main class="d-flex flex-column position-relative">
    <div class="back">
        @yield('back')
    </div>
    <div class="container mt-4 mb-4">
        @yield('content')
    </div>
</main>
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
