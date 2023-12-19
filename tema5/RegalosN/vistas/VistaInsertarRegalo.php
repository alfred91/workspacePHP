<?php namespace RegalosNavidad\vistas;
USE DeepRacer\modelos\Usuario;

class VistaInsertarRegalo {

    public static function render() {
        include "CabeceraMain.php";
        ?>
        <!-- Nuevo Regalo Modal -->
      <div class="container-fluid">
            
            <h1 class="mt-5 text-center">Lista de Regalos de <?php echo $usuario->getNombre();?></h1>
            
        <table>
        <a href="index.php?accion=insertarRegalo"><button class="btn btn-danger mt-2 mb-3">Añadir regalo</button></a>
          

        </table>
        <div class="px-4 py-5 my-5 text-center">            <h1>Insertar Regalo</h1>
                        <form action="index.php" method="post">
                            <!-- Campos del formulario (nombre, destinatario, precio, etc.) -->

                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" required>
                            <br><br>
                            <label for="destinatario">Destinatario:</label>
                            <input type="text" name="destinatario" id="destinatario">
                            <br><br>
                            <label for="precio">Precio:</label>
                            <input type="number" min="1" name="precio" id="precio">
                            <br><br>
                            <label for="estado">Estado:</label>
                            <input type="text" name="estado" id="estado">
                            <br><br>
                            <label for="anio">Año:</label>
                            <input type="number" min="1900" name="anio" id="anio">
                            <?php
                            $usuario = unserialize($_SESSION['usuario']);
                            echo '<input type="hidden" name="idUsuario" value="' . $usuario->getId() . '">';
                            ?>
                            <br><br>
                            <!-- Botón de envío dentro del formulario -->
                            <button type="submit" class="btn btn-success" name="accion" value="insertarRegaloForm">Insertar Regalo</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php include ("PieMain.php");
    }
}?>