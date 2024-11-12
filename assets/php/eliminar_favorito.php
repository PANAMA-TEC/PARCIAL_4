<?php

echo "<pre>";

require_once './biblioteca.php'; // Ajusta la ruta según la ubicación de biblioteca.php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['user_id']) && isset($_GET['google_books_id'])) {
        $user_id = $_GET['user_id'];
        $google_books_id = $_GET['google_books_id'];

        // Crear la conexión a la base de datos (puedes moverla a la clase si prefieres)
        $conexion = new mysqli("localhost", "root", "pty96", "biblioteca_personal");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el user_id existe en la base de datos
        $query = "SELECT id FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Verificar si el libro está en los favoritos del usuario
            $query_favoritos = "SELECT id FROM libro_favoritos WHERE user_id = ? AND google_books_id = ?";
            $stmt_favoritos = $conexion->prepare($query_favoritos);
            $stmt_favoritos->bind_param("is", $user_id, $google_books_id);
            $stmt_favoritos->execute();
            $resultado_favoritos = $stmt_favoritos->get_result();

            if ($resultado_favoritos->num_rows > 0) {
                // Si el libro está en los favoritos del usuario, eliminar el libro
                $biblioteca = new Biblioteca($conexion);
                $mensaje = $biblioteca->borrarLibroFavorito($user_id, $google_books_id);

                // Mostrar el mensaje que devuelve la función
                echo '{"status" : "ok" }';
            } else {
                // Si el libro no está en favoritos, devolver un mensaje de error
                echo '{"status" : "error", "message" : "El libro no está en favoritos del usuario" }';
            }

            // Cerrar el statement de favoritos
            $stmt_favoritos->close();
        } else {
            // Si el user_id no existe, devolver un mensaje de error
            echo '{"status" : "error", "message" : "El usuario no existe" }';
        }

        // Cerrar el statement y la conexión
        $stmt->close();
        $conexion->close();
    } else {
        // Parámetros insuficientes
        echo '{"status" : "error_1", "message" : "Parámetros insuficientes" }';
    }
} else {
   // Método no permitido
   echo '{"status" : "error_2", "message" : "Método no permitido" }';
}
