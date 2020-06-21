<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor\autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);

$studentList = $repository->allStudents();

var_dump($studentList);