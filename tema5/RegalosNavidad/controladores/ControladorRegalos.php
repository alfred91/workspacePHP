<?php namespace RegalosNavidad\controladores;
USE PDO;
USE RegalosNavidad\modelos\Conectar;

    use RegalosNavidad\vistas\VistaInicio;

    class ControladorRegalos {

        public static function mostrarInicio() {

            VistaInicio::render();
        }

        public static function mostrarRegalos(){
            $conexion= Conectar::conexion();
    
        try {
            $query = $conexion->query("SELECT * FROM Regalos");
            $matrizRegalos = $query->fetchAll(PDO::FETCH_ASSOC);
    
            } catch (\PDOException $e) {
                
                echo "Error en la consulta: " . $e->getMessage();
            }
    
            echo '<table width="100%" cellspacing="0" cellpadding="0">';
            echo '<tr><td>Nombre del artículo</td></tr>';
    
            foreach ($matrizRegalos as $regalo) {
                echo '<tr><td>' . $regalo["nombre"] . '</td></tr>';
            }
            echo'</table>';
        }


    }

?>