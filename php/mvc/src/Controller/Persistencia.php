<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Persistencia implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;

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

        $tipo = 'success';

        if(!is_null($id) && $id !== false) {
            // verifica se id existe para salvar alterações e não criar novos cursos
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMensagem($tipo, 'Curso atualizado com sucesso');
        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem($tipo, 'Curso criado com sucesso');
        }

        // Inserir no banco
        $this->entityManager->flush();

        header('Location:/listar-cursos', true, 302);
    }
}