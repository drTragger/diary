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
                user name
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
