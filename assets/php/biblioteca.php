<?php

    include "D:\laragon\www\PARCIALES\PARCIAL_4\keys.php";

    

    class Biblioteca {
        private $conexion;

        // Constructor para recibir y almacenar la conexión a la base de datos
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        // Función para guardar un libro como favorito
        public function guardarLibroFavorito($user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro) {
            // Verificar si el libro ya está guardado
            $query = "SELECT id FROM libros_guardados WHERE user_id = ? AND google_books_id = ?";
            
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("is", $user_id, $google_books_id);
            $stmt->execute();
            $stmt->store_result();
        
            if ($stmt->num_rows > 0) {
                return "El libro ya está en tus favoritos.";
            }
        
            // Insertar nuevo libro con la descripción
            $query = "INSERT INTO libros_guardados (user_id, google_books_id, titulo, autor, imagen_portada, resena_personal, descripcion_libro, fecha_guardado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("issssss", $user_id, $google_books_id, $titulo, $autor, $imagen_portada, $resena_personal, $descripcion_libro);
        
            if ($stmt->execute()) {
                return "Libro guardado como favorito.";
            } else {
                return "Error al guardar el libro: " . $this->conexion->error;
            }
        }    

        // Función para listar los libros guardados
        public function listarLibrosGuardados($user_id) {
            $query =    "SELECT google_books_id, titulo, autor, imagen_portada, resena_personal, fecha_guardado, descripcion_libro FROM libros_guardados WHERE user_id = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $libros = [];
            while ($row = $result->fetch_assoc()) {
                $libros[] = $row;
            }
            
            return $libros; // Devuelve un array con los libros guardados
        }

        // Función para borrar un libro de los favoritos
        public function borrarLibroFavorito($user_id, $google_books_id) {
            $query = "DELETE FROM libros_guardados WHERE user_id = ? AND google_books_id = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("is", $user_id, $google_books_id);

            if ($stmt->execute()) {
                return "Libro eliminado de tus favoritos.";
            } else {
                return "Error al eliminar el libro: " . $this->conexion->error;
            }
        }
        // Función para guardar el usuario 
        public function guardarUsuario($nombre, $email, $google_id) {
            // Verificar si el usuario ya existe
            $query = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                return "El correo electrónico ya está registrado.";
            }

            // Insertar el usuario
            $query = "INSERT INTO usuarios (nombre, email, google_id) VALUES (?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("sss", $nombre, $email, $google_id);

            if ($stmt->execute()) {
                return "Usuario registrado con éxito.";
            } else {
                return "Error al registrar el usuario: " . $this->conexion->error;
            }
        }
    }



?>
