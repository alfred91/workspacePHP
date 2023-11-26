<?php

    namespace Incidencias\controladores;

    use Incidencias\modelos\ModeloIncidencia;
    use Incidencias\vistas\VistaInicio;
    use Incidencias\vistas\VistaResultados;
    use Incidencias\modelos\ModeloCliente;
    use Incidencias\vistas\VistaResultadosClientes;

    class ControladorIncidencias {

        public static function mostrarInicio() {

            VistaInicio::render();
        }

        public static function mostrarIncidencias() {

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        public static function editarIncidencia($id) {

            $incidencia = ModeloIncidencia::editarIncidencia($id);

            VistaModificarIncidencia::render($incidencia);
        }
        

        public static function eliminarIncidencia($id) {

            ModeloIncidencia::eliminarIncidencia($id);

            $incidencias = ModeloIncidencia::mostrarIncidencias();

            VistaResultados::render($incidencias);
        }

        public static function añadirIncidencia() {
            
            $clientes = ModeloCliente::mostrarClientes();

            VistaResultadosClientes::render($clientes);
        }

        public static function buscarCliente($dni) {
            
            $clientes = ModeloCliente::buscarCliente($dni);

            VistaResultadosClientes::render($clientes);
        }

        public static function insertarIncidencia($id) {

            VistaAñadirIncidencia::render($id);
        }

        public static function buscarIncidencia($incidencia) {
            
            $incidencias = ModeloIncidencia::buscarIncidencia($incidencia);

            VistaResultados::render($incidencias);
        }

    }


?>