<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once '../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/**
 * @var Aluno[] $alunoList
 */
$alunoList = $alunoRepository->findAll();

foreach($alunoList as $aluno) {
    echo 'ID: ' . $aluno->getId();
    echo "\n";
    echo 'Nome: ' . $aluno->getNome();
    echo "\n";
    echo 'Telefones: ' . implode(', ', $aluno->getTelefones()
    ->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })->toArray());
}

// $edileuza = $alunoRepository->find(2);

// echo $edileuza->getNome();

// echo "\n";
// echo "\n";
// echo "\n";

// $samuel = $alunoRepository->findOneBy([
//     'nome' => 'Samuel Santos'
// ]);

// var_dump($samuel);