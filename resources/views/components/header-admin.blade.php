<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Licencias System</title>
    <link href='{{ asset("css/bootstrap.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/boxicons.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/sidebar.css") }}' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body className='snippet-body'>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="{{ url('/dashboard') }}" class="nav_logo"><span class="nav_logo-name">LicenciaSystem</span>  <i class='bx bx-layer nav_logo-icon mr-1'></i> </a>
                    <div class="nav_list"> 
                        <a href="{{ url('/dashboard') }}" class="nav_link active"><span class="nav_name">Inicio</span> <i class='bx bx-home-alt-2 nav_icon'></i> </a>                         
                        <a href="{{ url('/categorias')}}" class="nav_link"><span class="nav_name">Categorias</span> <i class='bx bx-category nav_icon'></i> </a> 
                        <a href="{{ url('/licencias')}}" class="nav_link"><span class="nav_name">Licencias</span>  <i class='bx bx-list-check nav_icon'></i> </a>                         
                    </div>
                </div> <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesión</span> </a>
            </nav>
        </div>        