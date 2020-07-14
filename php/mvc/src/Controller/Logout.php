<?php

namespace Alura\Cursos\Controller;

class Logout implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        if(!isset($_SESSION['logado'])) {
            header('Location: /login');
        }

        session_destroy();
        header('Location: /login');
    }
}