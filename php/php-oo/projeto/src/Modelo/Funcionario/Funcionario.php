<?php
namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\Cpf;

abstract class Funcionario extends Pessoa
{
    private $cargo;
    private $salario;

    public function __construct(string $nome, Cpf $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function setSalario(float $salario):void
    {
        $this->salario = $salario;
    }

    public function setNome(string $nome): void
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recebeAumento(float $valorAumento): void
    {
        if($valorAumento < 0) {
            echo "Aumento deve ser positivo";
            return;
        }
        $this->salario += $valorAumento;
    }

    abstract public function calculaBonificacao():float;
}