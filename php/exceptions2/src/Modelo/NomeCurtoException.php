<?php

namespace Alura\Banco\Modelo;

use DomainException;

class NomeCurtoException extends DomainException
{
    public function __construct()
    {
        $mensagem = "O nome incluido é muito curto. É necessário que haja ao menos 5 caracteres";
        parent::__construct($mensagem);
    }
}