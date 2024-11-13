<?php

    $conexion = new mysqli("localhost", "root", "", "biblioteca_personal");
    require_once('./biblioteca.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Verificar si el user_id está presente en la URL
        if (isset($_GET['user_id']) && is_numeric($_GET['user_id']) && isset($_SESSION['user_id'])) {
            // Acceder al user_id pasado por la URL (GET)
            $user_id = $_SESSION['array_id'];
            // Crear una instancia de la clase Biblioteca, pasando la conexión a la base de datos
            $biblioteca = new Biblioteca($conexion);

            // Llamar al método listarLibrosGuardados
            $libros_guardados = $biblioteca->listarLibrosGuardados($user_id);

            // Verificar si se encontraron libros guardados
            if (count($libros_guardados) > 0) {
                $json = [];
                
                foreach ($libros_guardados as $libro) {
                    // Agrega cada libro al array JSON
                    $json[] = [
                        'titulo' => htmlspecialchars($libro['titulo']),
                        'autor' => htmlspecialchars($libro['autor']),
                        'imagen_portada' => htmlspecialchars($libro['imagen_portada']),
                        'resena_personal' => htmlspecialchars($libro['resena_personal']),
                        'google_book_id' => htmlspecialchars($libro['google_books_id']),
                        'descripcion_libro' => htmlspecialchars($libro['descripcion_libro']),

                    ];
                }
                
                echo json_encode($json);
            } else {
                echo "No se encontraron libros guardados para el usuario $user_id.";
            }
        } else {
            echo "El parámetro user_id es requerido y debe ser un número entero válido.";
        }
    }

?>
