<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\Common\Persistence\ObjectRepository;

class RealizarLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{

    use FlashMessageTrait;

    private ObjectRepository $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if(is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'O e-mail digitado não é um e-mail valido');
            header('Location: /login');
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        /**
         * @var Usuario $usuario
         */

        $usuario = $this->repositorioDeUsuarios
            ->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'O e-mail ou senha são inválidos');           

            header('Location: /login');
            return;
        }
        session_start();
        $_SESSION['logado'] = true;
        
        header('Location: /listar-cursos');
    }
}