<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parqueaderos</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>    
        /* escoger parqueadero*/            
        svg {
        width: 100%;
        }

        #houses {
        animation: 10s road infinite linear;
        }
        #road {
        animation: 4s road infinite linear;
        }

        @keyframes road {
        from {
        }
        to {
            -moz-transform: translateX(-1800px);
            -webkit-transform: translateX(-1800px);
            -o-transform: translateX(-1800px);
            -ms-transform: translateX(-1800px);
            transform: translateX(-1800px);
        }
        }
        #part,
        #car {
        animation: 2s car infinite;
        }

        @keyframes car {
        from {
        }
        50% {
            -moz-transform: translateY(10px);
            -webkit-transform: translateY(10px);
            -o-transform: translateY(10px);
            -ms-transform: translateY(10px);
            transform: translateY(10px);
        }
        to {
        }
        }

        /* payment */
       
        /*--------------------
        Form
        --------------------*/
        .form fieldset {
        border: none;
        padding: 0;
        padding: 10px 0;
        position: relative;
        clear: both;
        }
        .form fieldset.fieldset-expiration {
        float: left;
        width: 60%;
        }
        .form fieldset.fieldset-expiration .select {
        width: 84px;
        margin-right: 12px;
        float: left;
        }
        .form fieldset.fieldset-ccv {
        clear: none;
        float: right;
        width: 86px;
        }
        .form fieldset label {
        display: block;
        text-transform: uppercase;
        font-size: 11px;
        color: rgba(0, 0, 0, 0.6);
        margin-bottom: 5px;
        font-weight: bold;
        font-family: Inconsolata;
        }
        .form fieldset input,
        .form fieldset .select {
        width: 100%;
        height: 38px;
        color: #333333;
        padding: 10px;
        border-radius: 5px;
        font-size: 15px;
        outline: none !important;
        border: 1px solid rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
        }
        .form fieldset input.input-cart-number,
        .form fieldset .select.input-cart-number {
        width: 82px;
        display: inline-block;
        margin-right: 8px;
        }
        .form fieldset input.input-cart-number:last-child,
        .form fieldset .select.input-cart-number:last-child {
        margin-right: 0;
        }
        .form fieldset .select {
        position: relative;
        }
        .form fieldset .select::after {
        content: "";
        border-top: 8px solid #222;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        position: absolute;
        z-index: 2;
        top: 14px;
        right: 10px;
        pointer-events: none;
        }
        .form fieldset .select select {
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        position: absolute;
        padding: 0;
        border: none;
        width: 100%;
        outline: none !important;
        top: 6px;
        left: 6px;
        background: none;
        }
        .form fieldset .select select :-moz-focusring {
        color: transparent;
        text-shadow: 0 0 0 #000;
        }
        .form button {
        width: 100%;
        outline: none !important;
        background: linear-gradient(180deg, #49a09b, #3d8291);
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        box-shadow: none;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        margin-top: 90px;
        }
        .form button .fa {
        margin-right: 6px;
        }

        /*--------------------
        Checkout
        --------------------*/
        .checkout {
        margin: 150px auto 30px;
        position: relative;
        width: 460px;
        background: white;
        border-radius: 15px;
        padding: 160px 45px 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        /*--------------------
        Credit Card
        --------------------*/
        .credit-card-box {
        perspective: 1000;
        width: 400px;
        height: 280px;
        position: absolute;
        top: -112px;
        left: 50%;
        transform: translateX(-50%);
        }
        .credit-card-box:hover .flip, .credit-card-box.hover .flip {
        transform: rotateY(180deg);
        }
        .credit-card-box .front,
        .credit-card-box .back {
        width: 400px;
        height: 250px;
        border-radius: 15px;
        -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
        background: linear-gradient(135deg, #bd6772, #53223f);
        position: absolute;
        color: #fff;
        font-family: Inconsolata;
        top: 0;
        left: 0;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.3);
        }
        .credit-card-box .front::before,
        .credit-card-box .back::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: url("http://cdn.flaticon.com/svg/44/44386.svg") no-repeat center;
        background-size: cover;
        opacity: 0.05;
        }
        .credit-card-box .flip {
        transition: 0.6s;
        transform-style: preserve-3d;
        position: relative;
        }
        .credit-card-box .logo {
        position: absolute;
        top: 9px;
        right: 20px;
        width: 60px;
        }
        .credit-card-box .logo svg {
        width: 100%;
        height: auto;
        fill: #fff;
        }
        .credit-card-box .front {
        z-index: 2;
        transform: rotateY(0deg);
        }
        .credit-card-box .back {
        transform: rotateY(180deg);
        }
        .credit-card-box .back .logo {
        top: 185px;
        }
        .credit-card-box .chip {
        position: absolute;
        width: 60px;
        height: 45px;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, #ddccf0 0%, #d1e9f5 44%, #f8ece7 100%);
        border-radius: 8px;
        }
        .credit-card-box .chip::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        border: 4px solid rgba(128, 128, 128, 0.1);
        width: 80%;
        height: 70%;
        border-radius: 5px;
        }
        .credit-card-box .strip {
        background: linear-gradient(135deg, #404040, #1a1a1a);
        position: absolute;
        width: 100%;
        height: 50px;
        top: 30px;
        left: 0;
        }
        .credit-card-box .number {
        position: absolute;
        margin: 0 auto;
        top: 103px;
        left: 19px;
        font-size: 38px;
        }
        .credit-card-box label {
        font-size: 10px;
        letter-spacing: 1px;
        text-shadow: none;
        text-transform: uppercase;
        font-weight: normal;
        opacity: 0.5;
        display: block;
        margin-bottom: 3px;
        }
        .credit-card-box .card-holder,
        .credit-card-box .card-expiration-date {
        position: absolute;
        margin: 0 auto;
        top: 180px;
        left: 19px;
        font-size: 22px;
        text-transform: capitalize;
        }
        .credit-card-box .card-expiration-date {
        text-align: right;
        left: auto;
        right: 20px;
        }
        .credit-card-box .ccv {
        height: 36px;
        background: #fff;
        width: 91%;
        border-radius: 5px;
        top: 110px;
        left: 0;
        right: 0;
        position: absolute;
        margin: 0 auto;
        color: #000;
        text-align: right;
        padding: 10px;
        }
        .credit-card-box .ccv label {
        margin: -25px 0 14px;
        color: #fff;
        }

        .the-most {
        position: fixed;
        z-index: 1;
        bottom: 0;
        left: 0;
        width: 50vw;
        max-width: 200px;
        padding: 10px;
        }
        .the-most img {
        max-width: 100%;
}

    </style>
</head>
<body style="background-color:#3A3F43">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm" >
            <div class="container" >
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;">
                    Parqueaderos
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:#fff;">Iniciar Session</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:#fff;">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color:#3A3F43">
            @yield('content')
        </main>
    </div>
</body>
</html>
