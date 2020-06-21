<?php

namespace Alura\Banco\Modelo\Conta;

abstract class Conta  {
    // definir dados da conta
    private $titular;
    protected $saldo;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->saldo = 0;
        Conta::$numeroDeContas++;
        $this->titular = $titular;
    }

    public function __destruct()
    {
        if(self::$numeroDeContas > 2) {
            echo "Há mais de uma conta ativa";
        }

        self::$numeroDeContas--;
    }

    abstract protected function percentualTarifa(): float;

    public function sacar(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();    
        $valorSaque = $valorASacar + $tarifaSaque;
        if($valorSaque > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }
        
        $this->saldo -= $valorSaque;
    }

    public function depositar(float $valorADepositar)
    {
        if($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->getNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->getCpf();
    }

    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }

    public static function getNumeroContas(): int
    {
        return self::$numeroDeContas;
    }
}