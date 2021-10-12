<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/fileInputNameUpdaters.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary center">
        <div class="container">

            <a class="navbar-brand" style="font-size: 2.0em" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav " style="font-size: 1.6em">
                    <a class="nav-item nav-link" href="{{ route('adminBooks') }}">Boeken</a>
                    <a class="nav-item nav-link" href="{{ route('adminKratmeister') }}">Kratmeister</a>
                    {{-- Overige producten are removed for now because they are not used yet --}}
                    {{-- <a class="nav-item nav-link" href="{{ route('adminOverigeProducten') }}">Overige producten</a> --}}
                    <a class="nav-item nav-link" href="{{ route('adminBeerbrands') }}">Bieren</a>
                    <a class="nav-item nav-link" href="{{ route('filterOrders',["id"=>"all"]) }}">Orders</a>
                    <a class="nav-item nav-link justify-content-end" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </nav>

    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>




</body>

</html>
