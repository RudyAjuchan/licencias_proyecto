<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Licencias System</title>
    <link href='{{ asset("css/bootstrap.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/boxicons.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/sidebar.css") }}' rel='stylesheet'>
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
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">LicenciaSystem</span> </a>
                    <div class="nav_list"> 
                        <a href="#" class="nav_link active"> <i class='bx bx-home-alt-2 nav_icon'></i> <span class="nav_name">Inicio</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i><span class="nav_name">Clientes</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-category nav_icon'></i> <span class="nav_name">Categorias</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-list-check nav_icon'></i> <span class="nav_name">Licencias</span></a> 
                        <a href="#" class="nav_link"> <i class='bx bx-shopping-bag nav_icon'></i> <span class="nav_name">Ventas</span>
                        </a> <a href="#" class="nav_link"> <i class='bx bxs-report nav_icon'></i> <span class="nav_name">Reportes</span> </a> 
                    </div>
                </div> <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesión</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100">
            <h4>Contenido LicenciaSystem</h4>
        </div>
        <!--Container Main end-->
        <script type='text/javascript' src='{{ asset("js/jqueryb.min.js") }}'></script>
        <script type='text/javascript' src='{{ asset("js/bootstrap.bundle.min.js") }}'></script>
        <script type='text/javascript' src='{{ asset("js/sidebar.js") }}'></script>

    </body>

</html>
