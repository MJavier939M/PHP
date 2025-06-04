CREATE DATABASE IF NOT EXISTS mi_base_de_datos;

USE mi_base_de_datos;

CREATE TABLE IF NOT EXISTS tableros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marcas JSON NOT NULL
);
