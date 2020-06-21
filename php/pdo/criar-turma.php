<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// realizo processos de definições de turma

//inserir os alunos da turma

$connection->beginTransaction();
try {
    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1989-05-05')
    );

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1990-01-01')
    );

    $studentRepository->save($anotherStudent);

    $connection->commit();
    echo "deu certo";
} catch(\PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}