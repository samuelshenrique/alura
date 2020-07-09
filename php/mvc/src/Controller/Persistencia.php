<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Persistencia implements InterfaceControladorRequisicao
{
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }


    public function processaRequisicao(): void
    {
        //pegar dados do formulario
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );
        
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        // montar modelo Curso
        $curso = new Curso();
        $curso->setDescricao($descricao);

        if(!is_null($id) && $id !== false) {
            // verifica se id existe para salvar alterações e não criar novos cursos
            $curso->setId($id);
            $this->entityManager->merge($curso);
        } else {
            $this->entityManager->persist($curso);
        }

        // Inserir no banco
        $this->entityManager->flush();

        header('Location:/listar-cursos', true, 302);
    }
}