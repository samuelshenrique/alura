<?php

namespace Alura\Pdo\Infrastructure;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Repository\StudentRepository;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use DateTimeImmutable;
use PDO;
use PDOStatement;

class PdoStudentRepository implements StudentRepository
{

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


    public function allStudents(): array
    {
        $statement = $this->connection->query('SELECT * FROM students;');

        return $this->hydrateStudentList($statement);
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {
        $statement = $this->connection->prepare('SELECT * FROM students where birth_date: :birthDate');
        $statement->bindValue(':birthDate', $birthDate->format('Y-m-d'));
        $statement->execute();

        return $this->hydrateStudentList($statement);
    }

    public function save(Student $student): bool
    {
        if($student->id() === null) {
            return $this->insert($student);
        }

        return $this->update($student);
    }

    public function update(Student $student): bool
    {
        $sqlUpdate = "UPDATE students SET name = :name, birth_date :birth_date WHERE id = :id";
        $statement = $this->connection->prepare($sqlUpdate);
        
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $statement->execute();
    }

    public function insert(Student $student): bool 
    {        
        $statement = $this->connection->prepare("INSERT INTO students(name, birth_date)
        VALUES(:name, :birthDate);");

        if($statement === false) {
            throw new \RuntimeException($this->connection->errorInfo()[2]);
        }
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birthDate', $student->birthDate()->format('Y-m-d'));

        $success = $statement->execute();

        if($success) {
            $student->defineId($this->connection->lastInsertId());
        }

        return $success;
    }

    public function remove(Student $student): bool
    {
        $sqlRemove = "DELETE FROM students WHERE id = :id";
        $statement = $this->connection->prepare($sqlRemove);
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);
        return $statement->execute();
    }

    private function hydrateStudentList(\PDOStatement $statement): array
    {
        $studentDataList = $statement->fetchAll();

        $studentList = [];
        foreach($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }

        return $studentList;
    }

    public function studentsWithPhones(): array
    {
        $sqlQuery = 'SELECT students.id, students.name,
                            students.birth_date, phones.id as phone_id,
                            phones.area_code, phones.number
                    FROM students JOIN phones ON students.id = phones.student_id;';
        
        $stmt = $this->connection->query($sqlQuery);
        $result = $stmt->fetchAll();

        $studentList = [];

        foreach($result as $row) {
            if(!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['name'],
                    new DateTimeImmutable($row['birth_date'])
                );
            }

            $phone = new Phone(
                $row['phone_id'],
                $row['area_code'],
                $row['number']
            );
            $studentList[$row['id']]->addPhone($phone);
        }

        return $studentList;
    }
}