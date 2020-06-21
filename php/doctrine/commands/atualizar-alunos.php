<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$id = $argv[1];
$newName =  $argv[2];

require_once '../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

// $alunoRepository = $entityManager->getRepository(Aluno::class);

// $aluno = $alunoRepository->find($id);
$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setNome($newName);

$entityManager->flush();
