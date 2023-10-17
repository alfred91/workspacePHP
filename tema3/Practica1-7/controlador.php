<?php session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {

        $email=$_POST['email'];
        $password=$_POST['password'];

    if(strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
        header("Location: login.php?error=CONTRASENA_INVALIDA");
        die();
    }

// Si el usuario y la contraseña son válidos, configurar la sesión y redirigir a proyectos.php

// De lo contrario, redirigir a login.php con un mensaje de error

// Configurar usuario y proyectos en la sesión

    $_SESSION['usuario'] = $email;

    $proyectos = array(

        array(
            'id' => 1,
            'nombre' => 'Proyecto 1',
            'fechaInicio' => '10-11-2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 7,
            'porcentajeCompletado' => 50,
            'importancia' => 1
        ),
        array(
            'id' => 2,
            'nombre' => 'Proyecto 2',
            'fechaInicio' => '01-12-2023',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 15,
            'porcentajeCompletado' => 75,
            'importancia' => 2
        ),
        array(
            'id' => 3,
            'nombre' => 'Proyecto 3',
            'fechaInicio' => '01-12-2023',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 33,
            'porcentajeCompletado' => 80,
            'importancia' => 3
        ),
        array(
            'id' => 4,
            'nombre' => 'Proyecto 4',
            'fechaInicio' => '19-11.2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 40,
            'porcentajeCompletado' => 90,
            'importancia' => 4
        ),
        array(
            'id' => 5,
            'nombre' => 'Proyecto 5',
            'fechaInicio' => '19-11-2022',
            'fechaFinPrevista' => '19-11-2022',
            'diasTranscurridos' => 5,
            'porcentajeCompletado' => 40,
            'importancia' => 5
        )

    );

    $_SESSION['proyectos']=$proyectos;

    header("Location: proyectos.php");
    die();

    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'nuevo') {
        // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinPrevista = $_POST['fechaFinPrevista'];
            $diasTranscurridos = $_POST['diasTranscurridos'];
            $porcentajeCompletado = $_POST['porcentajeCompletado'];
            $importancia = $_POST['importancia'];
        
        // Calcular nuevo ID
            $proyectos = $_SESSION['proyectos'];
            $nuevoId = max(array_column($proyectos, 'id')) + 1;
        
        // Crear nuevo proyecto
            $nuevoProyecto = array(
                'id' => $nuevoId,
                'nombre' => $nombre,
                'fechaInicio' => $fechaInicio,
                'fechaFinPrevista' => $fechaFinPrevista,
                'diasTranscurridos' => $diasTranscurridos,
                'porcentajeCompletado' => $porcentajeCompletado,
                'importancia' => $importancia
            );
        
        // Agregar el nuevo proyecto al array de sesiones
            $_SESSION['proyectos'][] = $nuevoProyecto;
        
            
        // Redirigir de vuelta a la página de proyectos
        
            header("Location: proyectos.php");
            die(); 
         } elseif ($_GET['accion'] == 'eliminar' && isset($_GET['id'])) {
// Acción para eliminar un proyecto
    $proyecto_id = $_GET['id'];

// Obtener proyectos de la sesión
    $proyectos = $_SESSION['proyectos'];

// Buscar el proyecto por ID y eliminarlo del array
    foreach ($proyectos as $key => $proyecto) {
        if ($proyecto['id'] == $proyecto_id) {
            unset($proyectos[$key]);
            break;
        }
    }
// Actualizar el array de proyectos en la sesión
    $_SESSION['proyectos'] = array_values($proyectos);

// Redirigir de vuelta a la página de proyectos
    header("Location: proyectos.php");
        die();

    } elseif ($_GET['accion'] == 'eliminarTodos') {
// Acción para eliminar todos los proyectos
        unset($_SESSION['proyectos']); // Elimina el array de proyectos de la sesión

// Redirige de vuelta a la página de proyectos
        header("Location: proyectos.php");
        die();   

  
    } elseif ($_GET['accion'] == 'ver' && isset($_GET['id'])) {
        $proyectoId = $_GET['id'];
        $proyectos = $_SESSION['proyectos'];
    
// Buscar el proyecto por ID
        $proyectoEncontrado = null;
        foreach ($proyectos as $proyecto) {
            if ($proyecto['id'] == $proyectoId) {
                $proyectoEncontrado = $proyecto;
                break;
            }
        }
    
        if ($proyectoEncontrado) {
// Almacena el proyecto en una variable de sesión para que pueda ser accedido en verProyecto.php
            $_SESSION['proyectoDetalle'] = $proyectoEncontrado;
            header("Location: verProyecto.php");
            die();
        } else {
 // Si el proyecto no se encuentra, redirige a la página de proyectos con un mensaje de error
            header("Location: proyectos.php?error=proyecto_no_encontrado");
            die();
        }
    } else {
// Si alguien intenta acceder a controlador.php directamente sin enviar datos del formulario o sin una acción válida, redirigir a login.php
    header("Location: login.php");
    exit();
}?>