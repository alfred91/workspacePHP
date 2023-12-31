<!DOCTYPE html>
<html lang="en">

<head>
    <title>Incidencias 🧑‍🔧</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:alfred.91.mc@gmail.com<">alfred.91.mc@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:662040002">662 040 002</a>
                </div>
                <div>

                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>

                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>

                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw me-2"></i></a>

                    <a class="text-light" href="https://github.com/alfred91" target="_blank"><i
                            class="fab fa-github fa-sm fa-fw "></i></a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="?accion=mostrarTodos">
                Incidencias 🧑‍🔧 <p></p>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">

                            <a href="?accion=mostrarTodos" class="nav-link"> Incidencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#nuevaIncidencia">Añadir
                                Incidencia</a></td>
                            </tr>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?">Vista Inicio</a>
                        </li>
                    </ul>
                </div>

                <div class="container my-4">
                    <form action="?" method="get" class="mt-2">
                        <div>
                            <input class="col-6 mt-3" type="text" class="form-control" id="inputDni" name="dni"
                                placeholder="Buscar por DNI">
                            <button type="submit" class="btn btn-primary" name="accion" value="buscarDni"><i
                                    class="btn btn-primary"></i></button>
                        </div>
                    </form>
                    <form action="?" method="post" class="mt-2">

                        <div>
                            <input class="col-6 mt-3" type="text" name="incidencia" id="incidencia"
                                placeholder="Ciudad / Estado">
                            <button type="submit" class="btn btn-primary" name="accion" value="buscarIncidencia"><i
                                    class="btn btn-primary"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </nav>