<?php


    require_once '.\biblioteca.php';
    session_start();

    //conexion a la base de datos
    //include 'conexion.php';

    $conexion = new mysqli("localhost", "root", "", "biblioteca_personal");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Aquí procesamos los datos enviados por el formulario
        if (isset($_SESSION['array_id']) && isset($_GET['google_books_id']) && isset($_GET['titulo']) && isset($_GET['autor']) && isset($_GET['imagen_portada']) && isset($_GET['resena_personal']) && isset($_GET['descripcion_libro'])) {
            // Acceder a los datos enviados por GET
            // echo "<pre> mysession" . $_SESSION['user_id'] . "</pre>";
            
            $user_id = $_SESSION['array_id'];
            $google_books_id = $_GET['google_books_id'];
            $titulo = $_GET['titulo'];
            $autor = $_GET['autor'];
            $imagen_portada = $_GET['imagen_portada'];
            $resena_personal = $_GET['resena_personal'];
            $descripcion_libro = $_GET['descripcion_libro'];
        
            if (isset($conexion)) {
            
                // Crear una instancia de la clase LibroFavorito
                $libro = new Biblioteca($conexion);
    
                // Llamar a la función para guardar el libro en los favoritos
                $resultado = $libro->guardarLibroFavorito($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro);
    
                // Mostrar el resultado
                echo '{"mensaje":"actualizado"}';
                $conexion->close();
            }
        
        }else{
            
            if (!isset($_SESSION['array_id'])){
                
                echo '{ "error" : "00x1"}';
            }else{
                echo '{ "error" : "consulta faltan parametros"}';
            }
        }

    }else{
        echo '{"mensaje":"error al actualizar"}';
    }
    

?>
