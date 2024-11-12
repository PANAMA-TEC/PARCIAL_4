<?php

require_once '.\assets\php\biblioteca.php';

//conexion a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se pasaron los parámetros 'nombre' y 'email' en la URL
    if (isset($_GET['nombre']) && isset($_GET['email'])) {
        // Acceder a los parámetros pasados por la URL (GET)
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];

        // Llamar al método guardarUsuario
        $mensaje = $this->guardarUsuario($nombre, $email);

        // Mostrar el mensaje que devuelve la función
        echo $mensaje;
//     } else {
//         echo "Faltan parámetros: nombre o email.";
//     }
// } else {
//     echo "Este script solo procesa solicitudes GET.";
    }
}

?>