<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyectos - Alfredo</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="proyectos.php">Inicio</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
        <!--LOGIN, SI EL USUARIO NO ESA LOGEADO, SE MUESTRA ICONO PARA INICIAR SESION, CUADO INICIE SESION,
            SE MUESTRA EL EMAIL EN LA PARTE SUPERIOR Y LA OPCION DE CERRAR SESION -->

            <div class="sb-sidenav-footer">
                    <div class="small">
                        <?php 
                        if(isset($_SESSION['usuario'])){
                            echo $_SESSION['usuario'];
                            echo" <a href='controlador.php?accion=cerrarSesion'>Cerrar sesión</a>"; 
                        } else {
                            echo"<ul class='navbar-nav ms-auto ms-md-0 me-3 me-lg-4'>
                            <li class='nav-item dropdown'>
                                <a class='button' id='navbarDropdown' href='login.php' role='button' aria-expanded='false'><i class='fas fa-user fa-fw'></i></a>
                                </ul>
                            </li>
                        </ul>";
                        }
                        ?>
                    </div>              
                </div>
            </nav>

        <!-- Navbar-->
            
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="proyectos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">PROYECTOS</div>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Proyectos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                  
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Gestionar Proyectos
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">

        <!--BOTONES DE LA GESTION DE PROYECTOS SOLO DISPONIBLES CUANDO EL USUARIO ESTA EN LA SESION -->

                                        <?php if (isset($_SESSION['usuario'])): ?>

                                            <a class="nav-link" href="nuevoProyecto.php?accion=nuevo">Añadir Proyecto</a>
                                            
                                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#nuevoProyectoModal">Añadir con Modal</a>

                                            <a class="nav-link" href='controlador.php?accion=eliminarTodos'>Eliminar Todos</a>

                                            <a class="nav-link" href="controlador.php?accion=generarPDF">Generar PDF</a>

                                        <?php endif; ?>

                                        </nav>
                                    </div>                                 
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