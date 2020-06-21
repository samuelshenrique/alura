create database if not exists alura_pdo;

use alura_pdo;

CREATE TABLE IF NOT EXISTS students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200),
    birth_date DATE
);

CREATE TABLE IF NOT EXISTS phones (
    id INT PRIMARY KEY,
    area_code VARCHAR(2),
    number VARCHAR(9),
    student_id INT,
    FOREIGN KEY(student_id) REFERENCES students(id)
);