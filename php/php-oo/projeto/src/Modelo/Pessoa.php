<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa
{
    protected $nome;
    private $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf->getCpf();
    }

    protected function validaNomeTitular(string $nome)
    {
        if(strlen($nome) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit;
        }
    }
}