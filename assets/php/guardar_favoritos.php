<?php

require_once 'D:\laragon\www\PARCIALES\PARCIAL_4\assets\php\biblioteca.php';  // Asegúrate de que la ruta sea correcta

// Verificar que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si todos los datos necesarios están presentes
    if (isset($_POST['user_id'], $_POST['google_books_id'], $_POST['titulo'], $_POST['autor'], $_POST['imagen_portada'], $_POST['resena_personal'], $_POST['descripcion_libro'])) {
        
        // Acceder a los datos enviados por POST
        $user_id = $_POST['user_id'];
        $google_books_id = $_POST['google_books_id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $imagen_portada = $_POST['imagen_portada'];
        $resena_personal = $_POST['resena_personal'];
        $descripcion_libro = $_POST['descripcion_libro'];

        // Verificar que la conexión esté disponible
        if (isset($conexion)) {
            // Crear una instancia de la clase LibroFavorito
            $libro = new LibroFavorito($conexion);

            // Llamar a la función para guardar el libro en los favoritos
            $resultado = $libro->guardarLibroFavorito($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro);

            // Mostrar el resultado
            echo $resultado;
        } else {
            echo "Error en la conexión a la base de datos.";
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "La solicitud no es POST.";
}

?>
