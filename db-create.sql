CREATE DATABASE recipe_database;

use recipe_database;

CREATE TABLE works (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	dishname VARCHAR(30) NOT NULL,
	cookingtime VARCHAR(15) NOT NULL,
	dietaries VARCHAR(30),
    ingridients VARCHAR(1000) NOT NULL,
    preparation VARCHAR(10000) NOT NULL,
	date TIMESTAMP
);