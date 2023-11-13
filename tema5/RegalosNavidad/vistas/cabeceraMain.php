<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Proyecto de Regalos - Alfredo" />
    <meta name="author" content="" />
    <title> Regalos de Navidad - Alfredo</title>

    <!-- Recursos Externos -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="sb-nav-fixed d-flex flex-column">
    <!-- Barra de Navegación -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Inicio</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-gift"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="controlador.php"
            method="GET">
            <div class="input-group">
                <input class="form-control" type="text" name="nombre" placeholder="Buscar regalo..."
                    aria-label="Buscar Regalo" aria-describedby="btnNavbarSearch" />
                <input type="hidden" name="accion" value="buscar">
                <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <!-- LOGIN Y SESIÓN -->
        <div>
            <div class="small">
                <?php
                if (isset($_SESSION['email'])) {
                    echo ("Logeado como: <b>" . $_SESSION['nombre'] . "</b> ");
                    echo ("<a href='?accion=cerrarSesion' class='btn btn-danger btn-sm px-4 gap-3'> Cerrar Sesion</a>");
                } else {
                    echo "<ul class='navbar-nav ms-auto ms-md-0 me-3 me-lg-4'>
                            <li class='nav-item>
                                <a class='button' id='navbar' href='login.php' role='button' aria-expanded='false'><i class='fas fa-gift'></i></a>
                            </li>
                        </ul>";
                }
                ?>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menú</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">REGALOS</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-gifts"></i></div>
                            Regalos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <!-- BOTONES DE LA GESTIÓN DE REGALOS SOLO DISPONIBLES CUANDO EL USUARIO ESTÁ EN LA SESIÓN -->
                                <?php if (isset($_SESSION['usuario'])): ?>
                                    <a class="nav-link" href="#" data-bs-toggle="modal"
                                        data-bs-target="#nuevoRegaloModal">Añadir Regalo</a>
                                <?php endif; ?>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading"></div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- Contenido principal aquí -->
                </div>
            </main>
        </div>
    </div>
    <h1 class="mt-4">Regalos</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla de Regalos
        </div>
        <div class="card-body">
            
        <a href="?accion=mostrarRegalos" class="btn btn-primary btn-lg px-4 gap-3"> Mostrar regalos</a> 
        
        <a class="nav-link" href="?accion=addRegalo" data-bs-toggle="modal"data-bs-target="#nuevoRegaloModal">Añadir Regalo</a>
                                
               
            </form>