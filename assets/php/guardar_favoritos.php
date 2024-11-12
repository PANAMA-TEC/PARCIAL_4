<?php

    require_once '.\assets\php\biblioteca.php';

    //conexion a la base de datos
    //include 'conexion.php';


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Aquí procesamos los datos enviados por el formulario
        if (isset($_GET['user_id']) && isset($_GET['google_books_id']) && isset($_GET['titulo']) && isset($_GET['autor']) && isset($_GET['imagen_portada']) && isset($_GET['resena_personal']) && isset($_GET['descripcion_libro'])) {
            // Acceder a los datos enviados por GET
            $user_id = $_GET['user_id'];
            $google_books_id = $_GET['google_books_id'];
            $titulo = $_GET['titulo'];
            $autor = $_GET['autor'];
            $imagen_portada = $_GET['imagen_portada'];
            $resena_personal = $_GET['resena_personal'];
            $descripcion_libro = $_GET['descripcion_libro'];
        }else{
            echo 'error en la consulta';
        }
    }
    // Crear una instancia de la clase que contiene la función guardarLibroFavorito
    $libro = new LibroFavorito($conexion);

    // Llamar a la función para guardar el libro en los favoritos
    $resultado = $libro->guardarLibroFavorito($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro);

    // Mostrar el resultado
    echo $resultado;

?>
