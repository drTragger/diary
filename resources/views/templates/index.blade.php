<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Diary</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
                <a href="">
                    <li>My groups</li>
                </a>
                <a href={{ url('/marks') }}>
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
                <a href="#">
                    <li>Add participant</li>
                </a>
                <a href="#">
                    <li>Delete group</li>
                </a>
            </ul>
        </nav>
        <div id="content">
            <div>
                @yield('content')
            </div>
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
