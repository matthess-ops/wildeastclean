<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Wild East</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/show.js') }}" defer></script> --}}
    <script src="{{ asset('js/fileInputNameUpdaters.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">




</head>

<body >



    @php
        $nrOfproducts = 0;

        if (Session::get('sessionBooksb') != null) {
            $nrOfproducts = $nrOfproducts + count(json_decode(Session::get('sessionBooksb'), true));
        }

        if (Session::get('sessionKratmeistertest') != null) {
            $nrOfproducts = $nrOfproducts + count(json_decode(Session::get('sessionKratmeistertest'), true));
        }
    @endphp


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container">

            <a style="font-size: 2.0em" class="navbar-brand" href="#">The Wild East</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item">
                        <a style="font-size: 1.6em"
                            class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('indexBook') }}">Boeken</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size: 1.6em"
                            class="nav-item nav-link {{ request()->is('/kratmeister') ? 'active' : '' }}"
                            href="{{ route('indexKratmeister') }}">De Kratmeister</a>
                    </li>

                    <li class="nav-item">
                        <a style="font-size: 1.6em"
                            class="nav-item nav-link {{ request()->is('/contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact</a>
                    </li>



                </ul>
                <a class="btn" href="{{ route('shoppingcart') }}" role="button"><i
                    style="font-size: 2rem;color: white" class="bi bi-cart-fill">-{{ $nrOfproducts }}</i></a>


            </div>
    </nav>



    <div id="wrap">
        <div id="main" class="container clear-top">

    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- <footer class="mt-auto bg-primary">

    </footer> --}}

</div>
</div>

    <footer class="footer bg-primary text-center text-white">
        <div>
            <p class="mb-1">info@thewildeast.nl</p>
            <a class="btn" href="{{ route('shoppingcart') }}" role="button"><i
                style="font-size: 2rem;color: white" class="bi bi-facebook"></i></a>

        </div>


    </footer>








</body>

</html>
