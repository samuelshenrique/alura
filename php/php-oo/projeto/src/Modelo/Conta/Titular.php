<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Autenticavel;
use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;


class Titular extends Pessoa implements Autenticavel
{
    private $endereco;

    public function __construct(Cpf $cpf, string $nome, Endereco $endereco) {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function Autenticar(string $senha): bool
    {
        return $senha === 'abcd';
    }
}