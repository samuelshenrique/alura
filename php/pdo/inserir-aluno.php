<?php 

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor\autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    "Samuel', ''); DROP TABLE students; -- Santos",
    new \DateTimeImmutable('1999-05-31')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES
(:name, :birth_date)";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if($statement->execute()) {
    echo "aluno incluido";
} else {
    echo "Aluno não incluido";
}

// var_dump($pdo->exec($sqlInsert));