<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //pegar dados do formulario
        $descricao = filter_var($request->getParsedBody()['descricao'], FILTER_SANITIZE_STRING);
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        // montar modelo Curso
        $curso = new Curso();
        $curso->setDescricao($descricao);

        if(!is_null($id) && $id !== false) {
            // verifica se id existe para salvar alterações e não criar novos cursos
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMensagem('success', 'Curso atualizado com sucesso');
        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem('success', 'Curso criado com sucesso');
        }

        // Inserir no banco
        $this->entityManager->flush();

        return new Response('302', ['Location' => '/listar-cursos']);
    }
}