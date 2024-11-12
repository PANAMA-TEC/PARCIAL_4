<?php

require_once '.\assets\php\biblioteca.php';

//conexion a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si el user_id está presente en la URL
    if (isset($_GET['user_id'])) {
        // Acceder al user_id pasado por la URL (GET)
        $user_id = $_GET['user_id'];

        // Llamar al método listarLibrosGuardados
        $libros_guardados = $this->listarLibrosGuardados($user_id);

        // Verificar si se encontraron libros guardados
        // if (count($libros_guardados) > 0) {
        //     echo "Libros guardados para el usuario $user_id:<br>";
        //     foreach ($libros_guardados as $libro) {
        //         echo "Título: " . htmlspecialchars($libro['titulo']) . "<br>";
        //         echo "Autor: " . htmlspecialchars($libro['autor']) . "<br>";
        //         echo "Imagen de portada: <img src='" . htmlspecialchars($libro['imagen_portada']) . "' alt='Portada'><br>";
        //         echo "Reseña personal: " . htmlspecialchars($libro['resena_personal']) . "<br>";
    }
}
?>