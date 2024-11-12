<?php

require_once('biblioteca.php');  // Asegúrate de que este archivo existe y está bien incluido

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se pasaron los parámetros 'nombre' y 'email' en la URL
    if (isset($_GET['nombre']) && isset($_GET['email'])&& isset($_GET['google_id'])) {
        // Acceder a los parámetros pasados por la URL (GET)
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        

        // Crear la conexión a la base de datos (puedes moverla a la clase si prefieres)
        $conexion = new mysqli("localhost", "root", "pty96", "biblioteca_personal");

        // Verificar si la conexión fue exitosa
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Crear una instancia de la clase Biblioteca
        $biblioteca = new Biblioteca($conexion);  // Asegúrate de pasar la conexión al constructor de la clase

        // Llamar al método para guardar el usuario
        $mensaje = $biblioteca->guardarUsuario($nombre, $email);

        // Mostrar el mensaje que devuelve la función
        echo $mensaje;

        // Cerrar la conexión después de completar la operación
        $conexion->close();
    } else {
        echo "Faltan parámetros: nombre o email.";
    }
} else {
    echo "Este script solo procesa solicitudes GET.";
}

?>
