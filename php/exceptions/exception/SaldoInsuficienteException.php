<?php

namespace exception;

class SaldoInsuficienteException extends \Exception{
    private float $valor;
    private float $saldo;


    public function __construct($mensagem, $valor, $saldo)
    {
        $this->valor = $valor;
        $this->saldo = $saldo;
        parent::__construct($mensagem, null, null);
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>