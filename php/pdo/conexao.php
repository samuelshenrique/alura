<?php

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

// $result = $pdo->exec("INSERT INTO phones(area_code, number, student_id) VALUES('11', '999999999', 15), ('21', '999111999', 15);");
// var_dump($result);
// exit;

$pdo->exec('CREATE TABLE IF NOT EXISTS students(
    id INTEGER PRIMARY KEY,
    name TEXT,
    birth_date TEXT
);

CREATE TABLE IF NOT EXISTS phones (
    id INTEGER PRIMARY KEY,
    area_code TEXT,
    number TEXT,
    student_id INTEGER,
    FOREIGN KEY(student_id) REFERENCES students(id)
);');

echo 'Conectei';