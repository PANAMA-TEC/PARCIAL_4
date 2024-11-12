<?php

require_once '.\assets\php\biblioteca.php';

//conexion a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se pasaron los parámetros 'user_id' y 'google_books_id' en la URL
    if (isset($_GET['user_id']) && isset($_GET['google_books_id'])) {
        // Acceder a los parámetros pasados por la URL (GET)
        $user_id = $_GET['user_id'];
        $google_books_id = $_GET['google_books_id'];

        // Llamar al método borrarLibroFavorito
        $mensaje = $this->borrarLibroFavorito($user_id, $google_books_id);

        // Mostrar el mensaje que devuelve la función
    echo $mensaje;

    // } else {
    //     echo "Faltan parámetros: user_id o google_books_id.";
    // }
    // } else {
    //         echo "Este script solo procesa solicitudes GET.";
    }
}

?>
