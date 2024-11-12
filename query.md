-- Crear la base de datos
CREATE DATABASE mi_proyecto;
 
-- Seleccionar la base de datos
USE mi_proyecto;
 
-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nombre VARCHAR(100),
    google_id VARCHAR(50),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 
-- Crear la tabla de libros_guardados
CREATE TABLE libros_guardados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    google_books_id VARCHAR(50),
    titulo VARCHAR(255),
    autor VARCHAR(255),
    imagen_portada VARCHAR(255),
    resena_personal TEXT,
    fecha_guardado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);