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
<body style="max-width: 100%; overflow-x: hidden">
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
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                            @if(Auth::check())
                            <a class="nav-link" href="/logged_in/articles">Article</a>
                            <a class="nav-link" href="{{ route('logged_in.dashboard') }}">Profile</a>
                            <a class="nav-link" href="/logout">Logout</a>
                            @endif
                            @if(!Auth::check())
                            <a class="nav-link" href="{{ route('landing.register') }}">Register</a>
                            @endif

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="main-content" style="max-width: 100%;margin-left: 1.5rem">
        @yield('content')
    </div>
    <footer id="footer-content" class="bg-dark  shadow-lg" style="min-height: 70px">
        <h1>Ini untuk Footer</h1>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $('#point-information').ready(function(){
            $.get('{{route('get.point_info')}}').then(resp => {
                var { data } = resp;
                $('#point_value').html(data.point);
                $('#point_conversion_value').html(data.conversion);
                $('#point_expired_value').html(data.expired);
                console.log(data.canWithDraw);
                if(!data.canWithDraw){
                    $("#can_withdraw").addClass('d-none')   
                }
            })
        })
        function articleNavigation(slug){
            window.open('{{ Auth::check() ? "/logged_in/article/" : "guess_article/" }}'+slug, '_self');
        }
        const modernAlert = {
            success: (title = 'Sukses', message) => {
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: message
                })
            },
            error: (title = 'Error', message) => {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message
                })
            },
            info: (title = 'Error', message) => {
                Swal.fire({
                    icon: 'info',
                    title: title,
                    text: message
                })
            },
            loading: () => {
                Swal.fire({
                    title:"", 
                    text:"Loading...",
                    iconHtml: "<img class='img-responsive rounded' src='{{ asset('/img/loading.gif') }}'>",
                    buttons: false,      
                    closeOnClickOutside: false,
                });   
            }
        }
       
    </script>
    @yield('scripts')
</body>
</html>