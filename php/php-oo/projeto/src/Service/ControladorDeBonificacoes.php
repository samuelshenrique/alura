<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private $totalBonificoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario):void
    {
        $this->totalBonificoes += $funcionario->calculaBonificacao();
    }

    public function getTotalBonificacoes():float
    {
        return $this->totalBonificoes;
    }
}