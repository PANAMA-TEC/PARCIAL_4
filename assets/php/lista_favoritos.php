<?php

echo "<pre>";
require_once('biblioteca.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si el user_id está presente en la URL
    if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
        // Acceder al user_id pasado por la URL (GET)
        $user_id = (int) $_GET['user_id'];

        // Crear una instancia de la clase Biblioteca, pasando la conexión a la base de datos
        $biblioteca = new Biblioteca($conexion);

        // Llamar al método listarLibrosGuardados
        $libros_guardados = $biblioteca->listarLibrosGuardados($user_id);

        // Verificar si se encontraron libros guardados
        if (count($libros_guardados) > 0) {
            echo "<h2>Libros guardados para el usuario $user_id:</h2><ul>";
            foreach ($libros_guardados as $libro) {
                echo "<li>";
                echo "<strong>Título:</strong> " . htmlspecialchars($libro['titulo']) . "<br>";
                echo "<strong>Autor:</strong> " . htmlspecialchars($libro['autor']) . "<br>";
                echo "<strong>Imagen de portada:</strong> <img src='" . htmlspecialchars($libro['imagen_portada']) . "' alt='Portada' style='width:100px;height:auto;'><br>";
                echo "<strong>Reseña personal:</strong> " . htmlspecialchars($libro['resena_personal']) . "<br><br>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No se encontraron libros guardados para el usuario $user_id.";
        }
    } else {
        echo "El parámetro user_id es requerido y debe ser un número entero válido.";
    }
}

?>
