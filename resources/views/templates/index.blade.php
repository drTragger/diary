<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Diary</title>
</head>
<body>
<div class="flex-container">
    <header>
        <div class="header-flex">
            <div id="images">
                <img src="/images/logo.png" alt="logo" id="logo">
            </div>
            <div id="user">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
{{--                    @if (Auth::guest())--}}
{{--                        <li><a href="{{ url('/login') }}">Login</a></li>--}}
{{--                        <li><a href="{{ url('/register') }}">Register</a></li>--}}
{{--                    @else--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
{{--                    @endif--}}
                </ul>
            </div>
        </div>
    </header>
    <main class="main-flex">
        <nav>
            <ul id="menu">
                <a href="{{route('groups.index')}}">
                    <li>My groups</li>
                </a>
                <a href="{{route('groups.create')}}">
                    <li>Create Group</li>
                </a>
                <a href="">
                    <li>Marks</li>
                </a>
                <a href="">
                    <li>Participants</li>
                </a>
                <a href="#">
                    <li>New homework</li>
                </a>
                <a href="#">
                    <li>Submited homework</li>
                </a>

            </ul>
        </nav>
        <div id="content">
            @yield('content')
        </div>
    </main>
    <footer>
        <p>
            @junstudio-2021
        </p>
    </footer>
</div>
</body>
</html>
