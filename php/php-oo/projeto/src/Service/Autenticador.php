<?php

namespace Alura\Banco\Service;
use Alura\Banco\Modelo\Autenticavel;

class Autenticador {
    public function login(Autenticavel $autenticavel, string $senha): bool
    {
        if($autenticavel->Autenticar($senha)) {
            echo "Usuário Logado no Sistema";
            return true;         
        }

        echo "Senha inválida";
        return false;
    }
}