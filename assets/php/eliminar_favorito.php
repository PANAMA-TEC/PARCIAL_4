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
            // Si el user_id existe, crear instancia de la clase Biblioteca y llamar al método borrarLibroFavorito
            $biblioteca = new Biblioteca($conexion);
            $mensaje = $biblioteca->borrarLibroFavorito($user_id, $google_books_id);

            // Mostrar el mensaje que devuelve la función
            echo '{"status" : "ok" }';
        } else {
            // Si el user_id no existe, devolver un mensaje de error
            echo '{"status" : "error", "message" : "El usuario no existe" }';
        }

        // Cerrar el statement y la conexión
        $stmt->close();
        $conexion->close();
    } else {
        // Mostrar el mensaje que devuelve la función
        echo '{"status" : "error_1" }';
    }
} else {
   // Mostrar el mensaje que devuelve la función
   echo '{"status" : "error_2" }';
}
