<?php

require_once '.\assets\php\biblioteca.php';

//conexion a la base de datos
//include 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí procesamos los datos enviados por el formulario
    if (isset($_POST['user_id']) && isset($_POST['google_books_id']) && isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['imagen_portada']) && isset($_POST['resena_personal']) && isset($_POST['descripcion_libro'])) {
        // Acceder a los datos enviados por POST
        $user_id = $_POST['user_id'];
        $google_books_id = $_POST['google_books_id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $imagen_portada = $_POST['imagen_portada'];
        $resena_personal = $_POST['resena_personal'];
        $descripcion_libro = $_POST['descripcion_libro'];
    }
}
    // Crear una instancia de la clase que contiene la función guardarLibroFavorito
    $libro = new LibroFavorito($conexion);

    // Llamar a la función para guardar el libro en los favoritos
    $resultado = $libro->guardarLibroFavorito($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro);

    // Mostrar el resultado
    echo $resultado;

?>
