<!DOCTYPE html>
<html lang="es">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Licencias</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/styleDU.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('img/le_logo.png')}}" type="image/png" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/CustomScrollbar.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('img/loading.gif')}}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('img/le_logo.png')}}" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/windows') }}">Windows</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/antivirus') }}">Antivirus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/office') }}">Office</a>
                                    </li>
                                    @if (Auth::guest())
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                                    </li>

                                    @else

                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                href="#">{{ auth()->user()->name }}</a>
                                            <!-- <button class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Dropdown button
                                                </button> -->
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('/profile') }}">Cuenta</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                                    Sesión</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" id="icon-carrito"><i class="fa fa-shopping-cart" aria-hidden="true"
                                                data-toggle="modal" data-target="#modalCarrito"></i><sup
                                                class="ml-1" id="contCarrito">0</sup></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->


{{-- Modal carrito --}}
<div class="modal fade" id="modalCarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h4>Carrito de compras</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="items"></tbody>
                        <tfoot>
                            <tr id="footer">
                                <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="{{ url('/procesoCompra') }}" class="btn btn-success btn-block">Iniciar Compra</a>                    
                    
                </div>

                <template id="template-footer">
                    <th scope="row" colspan="2">Total productos</th>
                    <td>10</td>
                    <td>
                        <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                            vaciar todo
                        </button>
                    </td>
                    <td class="font-weight-bold">Q <span>5000</span></td>
                </template>

                <template id="template-carrito">
                    <tr>
                        <th scope="row">id</th>
                        <td>Café</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-info btn-sm">
                                +
                            </button>
                            <button class="btn btn-danger btn-sm">
                                -
                            </button>
                        </td>
                        <td>Q <span>500</span></td>
                    </tr>
                </template>

            </div>
        </div>
    </div>
</div>
{{-- Modal carrito --}}