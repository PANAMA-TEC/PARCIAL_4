<?php

    require_once './biblioteca.php'; // Ajusta la ruta según la ubicación de biblioteca.php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_SESSION['array_id']) && isset($_GET['google_books_id']) && isset($_SESSION['array_id'])) {
            
            $user_id = $_SESSION['array_id'];
            $google_books_id = $_GET['google_books_id'];

            // Crear la conexión a la base de datos (puedes moverla a la clase si prefieres)
            $conexion = new mysqli("localhost", "root", "", "biblioteca_personal");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Crear instancia de la clase Biblioteca y pasarle la conexión
            $biblioteca = new Biblioteca($conexion);

            // Llamar al método para borrar el libro
            $mensaje = $biblioteca->borrarLibroFavorito($_SESSION['array_id'], $google_books_id);

            // Mostrar el mensaje que devuelve la función
            echo '{"status" : "ok" }';

            // Cerrar la conexión después de completar la operación
            $conexion->close();
        } else {
            // Mostrar el mensaje que devuelve la función
            echo '{"status" : "error_1" }';
        }
    } else {
    // Mostrar el mensaje que devuelve la función
    echo '{"status" : "error_2" }';
    }
?>
