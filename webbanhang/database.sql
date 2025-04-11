<<<<<<< HEAD
CREATE DATABASE my_store; 
USE my_store;
CREATE TABLE category 
( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL, 
	description TEXT
);
CREATE TABLE product 
(
 	id INT AUTO_INCREMENT PRIMARY KEY,
 	name VARCHAR(100) NOT NULL,
 	description TEXT,
 	price DECIMAL(10, 2) NOT NULL,
	image VARCHAR(255) DEFAULT NULL,
 	category_id INT,
 	FOREIGN KEY (category_id) REFERENCES category(id)
);
=======
CREATE DATABASE my_store; 
USE my_store;
CREATE TABLE category 
( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL, 
	description TEXT
);
CREATE TABLE product 
(
 	id INT AUTO_INCREMENT PRIMARY KEY,
 	name VARCHAR(100) NOT NULL,
 	description TEXT,
 	price DECIMAL(10, 2) NOT NULL,
	image VARCHAR(255) DEFAULT NULL,
 	category_id INT,
 	FOREIGN KEY (category_id) REFERENCES category(id)
);
>>>>>>> e934524d363402ba7a2a96d05723c302886efe1d
category