<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\Persistence\ObjectRepository as PersistenceObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin extends ControllerComHtml implements RequestHandlerInterface
{

    use FlashMessageTrait;

    private PersistenceObjectRepository $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryStrings = $request->getParsedBody();

        var_dump($queryStrings);

        $email = filter_var($queryStrings['email'], FILTER_VALIDATE_EMAIL);

        if(is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'O e-mail digitado não é um e-mail valido');
            return new Response('302', ['Location' => '/login']);
        }

        $senha = filter_var($queryStrings['senha'], FILTER_SANITIZE_STRING);

        /**
         * @var Usuario $usuario
         */

        $usuario = $this->repositorioDeUsuarios
            ->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'O e-mail ou senha são inválidos');
            return new Response('302', ['Location' => '/login']);
        }

        $_SESSION['logado'] = true;
        
        return new Response('302', ['Location' => '/listar-cursos']);
    }
}