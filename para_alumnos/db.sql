-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS examen_bd_movies;

-- Usar la base de datos
USE examen_bd_movies;

-- Eliminar la tabla si ya existe
DROP TABLE IF EXISTS movies;

-- Crear la tabla de películas
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único para cada película
    title VARCHAR(255) NOT NULL,             -- Título de la película
    description VARCHAR(1023),      -- Descripción
    rating DECIMAL(3, 1) NOT NULL,           -- Puntuación de la película (de 0.0 a 10.0)
    image_path VARCHAR(255) NOT NULL,        -- Ruta a la imagen de la portada
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del registro
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Fecha de última actualización
);

-- Insertar algunos datos de ejemplo
INSERT INTO movies (title, description, rating, image_path)
VALUES 
('Interstellar', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.", 8.8, 'slider1.jpg'),
('The revenant', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.",9.0, 'slider2.jpg'),
('Die hard', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.",7.2, 'slider3.jpg'),
('The walk', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.",8.8, 'slider4.jpg'),
('Oblivon', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.", 9, 'slider5.jpg'),
('Blade Runner 2049', "Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.",9.8, 'slider6.jpg');