
CREATE DATABASE IF NOT EXISTS proyecto_dw;
USE proyecto_dw;

CREATE TABLE usuario(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    correo VARCHAR(50),
	clave VARCHAR(50) NOT NULL UNIQUE,
	rol VARCHAR(20) NOT NULL
);

CREATE TABLE ventas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	producto VARCHAR(100) NOT NULL,
	cantidad INT NOT NULL,
	precioUnitario DECIMAL(10,2) NOT NULL,
	total DECIMAL(10,2) NOT NULL
);
CREATE TABLE productos(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(100) NOT NULL,
	precioUnitario DECIMAL(10,2) NOT NULL,
    categoria varchar(50) not null,
	stock int not null
);

INSERT INTO USUARIO(nombre, clave,rol) VALUES
('admin','1234','administrador');

INSERT INTO USUARIO(nombre, correo, clave, rol) VALUES
('alejandro','alej@ug.com','123a','administrador'),
('andres','andres@ug.com','123a45','vendedor'),
('maria','maria@ug.com','98b765','administrador'),
('carlos','carlos@ug.com','4c5678','vendedor'),
('lucia','lucia@ug.com','567d89','vendedor'),
('javier','javier@ug.com','e12345','administrador'),
('paula','paula@ug.com','6789f1','vendedor'),
('david','david@ug.com','12g345','vendedor'),
('sofia','sofia@ug.com','7891h2','administrador');