<?php

namespace Alura\Banco\Modelo\Conta;

class ContaCorrente extends Conta
{
    protected function percentualTarifa(): float
    {
        return 0.05;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
           throw new SaldoInsuficienteException($valorATransferir, $this->saldo);
        }

        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }
}