<?php include('cabecera.php');?>
<div id="layoutSidenav_content">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar sesión</h3></div>
                                    <div class="card-body">
                                    <form method="post" action="controlador.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="Correo electronico" name="email" required />
                                            <label for="inputEmail">Correo Electrónico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Recordar contraseña</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <button class="btn btn-primary" type="submit">Entrar</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="proyectos.php">Inicio</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
<?php include('pie.php'); ?>