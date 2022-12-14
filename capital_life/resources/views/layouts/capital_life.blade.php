<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
</head>
<body style="max-width: 100vw; overflow-x: hidden">
    <div id="header">
        <div class="header-top px-4 py-3" style="min-height: 70px">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRglQ6Pfh5xCmH6omVMztn1SEexxCEsq9qchz3Vxmjv&s" style="max-width: 100%;box-sizing: border-box" alt="Capital Life Logo">
        </div>
        <div class="header-bottom ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-4 shadow-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Article</a>
                            <a class="nav-link" href="#">Profile</a>
                            <a class="nav-link" href="#">Logout</a>
                            <a class="nav-link" href="{{ route('landing.register') }}">Register</a>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="main-content" style="">
        @yield('content')
    </div>
    <footer id="footer-content" class="bg-dark  shadow-lg" style="min-height: 70px">
        <h1>Ini untuk Footer</h1>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    @yield('scripts')
</body>
</html>