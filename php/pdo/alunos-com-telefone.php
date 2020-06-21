<?php

use Alura\Pdo\Infrastructure\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

$repository = new PdoStudentRepository($connection);

$studentList = $repository->studentsWithPhones();

echo $studentList[15]->phones()[0]->formattedPhone();