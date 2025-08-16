CREATE DATABASE IF NOT EXISTS citas_medicas;
USE citas_medicas;

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_paciente VARCHAR(100) NOT NULL,
    especialidad VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL
);
