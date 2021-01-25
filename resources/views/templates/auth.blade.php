<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diary</title>
{{--TODO auth--}}
{{--    <!-- Fonts -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"--}}
{{--          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

{{--    <!-- Styles -->--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="../../css/style.css">--}}

{{--    <style>--}}
{{--        body {--}}
{{--            font-family: 'Lato';--}}
{{--        }--}}

{{--        .fa-btn {--}}
{{--            margin-right: 6px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container auth-container">--}}
{{--    <div class="auth">--}}
{{--        <div class="auth-logo-container">--}}
{{--            <a class="auth-a-logo" href="{{ url('/login') }}" title="На главную">--}}
{{--                <img src="/images/logo.png" alt="Logo" class="auth-logo">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        @yield('content')--}}
{{--    </div>--}}
{{--</div>--}}



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    a:hover,a:focus{
        outline: none;
        text-decoration: none;
    }
    .tab{
        background: #200122;
        background: -webkit-linear-gradient(to bottom, #6f0000, #200122);
        background: linear-gradient(to bottom, #6f0000, #200122);
        padding: 40px 50px;
        position: relative;
    }
    .tab:before{
        content: "";
        width: 100%;
        height: 100%;
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(#2e3a6a,#2f0b45);
        opacity: 0.85;
    }
    .tab .nav-tabs{
        border-bottom: none;
        padding: 0 20px;
        position: relative;
    }
    .tab .nav-tabs li{ margin: 0 30px 0 0; }
    .tab .nav-tabs li a{
        font-size: 18px;
        color: #fff;
        border-radius: 0;
        text-transform: uppercase;
        background: transparent;
        padding: 0;
        margin-right: 0;
        border: none;
        border-bottom: 2px solid transparent;
        opacity: 0.5;
        position: relative;
        transition: all 0.5s ease 0s;
    }
    .tab .nav-tabs li a:hover{ background: transparent; }
    .tab .nav-tabs li.active a,
    .tab .nav-tabs li.active a:focus,
    .tab .nav-tabs li.active a:hover{
        border: none;
        background: transparent;
        opacity: 1;
        border-bottom: 2px solid #eec111;
        color: #fff;
    }
    .tab .tab-content{
        padding: 20px 0 0 0;
        margin-top: 40px;
        background: transparent;
        z-index: 1;
        position: relative;
    }
    .form-bg{ background: #ddd; }
    .form-horizontal .form-group{
        margin: 0 0 15px 0;
        position: relative;
    }
    .form-horizontal .form-control{
        height: 40px;
        background: rgba(255,255,255,0.2);
        border: none;
        border-radius: 20px;
        box-shadow: none;
        padding: 0 20px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        transition: all 0.3s ease 0s;
    }
    .form-horizontal .form-control:focus{
        box-shadow: none;
        outline: 0 none;
    }
    .form-horizontal .form-group label{
        padding: 0 20px;
        color: #7f8291;
        text-transform: capitalize;
        margin-bottom: 10px;
    }
    .form-horizontal .main-checkbox{
        width: 20px;
        height: 20px;
        background: #eec111;
        float: left;
        margin: 5px 0 0 20px;
        border: 1px solid #eec111;
        position: relative;
    }
    .form-horizontal .main-checkbox label{
        width: 20px;
        height: 20px;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    .form-horizontal .main-checkbox label:after{
        content: "";
        width: 10px;
        height: 5px;
        position: absolute;
        top: 5px;
        left: 4px;
        border: 3px solid #fff;
        border-top: none;
        border-right: none;
        background: transparent;
        opacity: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .form-horizontal .main-checkbox input[type=checkbox]{ visibility: hidden; }
    .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{ opacity: 1; }
    .form-horizontal .text{
        float: left;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        margin-left: 7px;
        line-height: 20px;
        padding-top: 5px;
        text-transform: capitalize;
    }
    .form-horizontal .btn{
        width: 100%;
        background: #eec111;
        padding: 10px 20px;
        border: none;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border-radius: 20px;
        text-transform: uppercase;
        margin: 20px 0 30px 0;
    }
    .form-horizontal .btn:focus{
        background: #eec111;
        color: #fff;
        outline: none;
        box-shadow: none;
    }
    .form-horizontal .forgot-pass{
        border-top: 1px solid #615f6c;
        margin: 0;
        text-align: center;
    }
    .form-horizontal .forgot-pass .btn{
        width: auto;
        background: transparent;
        margin: 30px 0 0 0;
        color: #615f6c;
        text-transform: capitalize;
        transition: all 0.3s ease 0s;
    }
    .form-horizontal .forgot-pass .btn:hover{ color: #eec111; }
    @media only screen and (max-width: 479px){
        .tab{ padding: 40px 20px; }
    }
</style>
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="{{ url('/login')}}" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
                    <li role="presentation"><a href="{{ url('/register') }}" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
                </ul>
                <!-- Tab panes -->
                @yield('content')--}}
            </div>

        </div><!-- /.col-md-offset-3 col-md-6 -->
    </div><!-- /.row -->
</div><!-- /.container -->

    <!-- JavaScripts -->
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"--}}
{{--            integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"--}}
{{--            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="{{ elixir('js/app.js') }}"></script>--}}
    </body>
</html>