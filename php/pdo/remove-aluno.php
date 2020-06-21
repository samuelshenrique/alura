<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$sqlDelete = "DELETE FROM students where id = ?";

$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 1, PDO::PARAM_INT);

$results = $preparedStatement->execute();

$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
$preparedStatement->execute();

var_dump($results);




