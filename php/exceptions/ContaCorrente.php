<?php

require_once 'autoload.php';

use exception\OperacaoNaoRealizadaException;
use exception\SaldoInsuficienteException;

class ContaCorrente {
    private $titular;
    private $agencia;
    private $numero;
    private $saldo;

    public static $taxaOperacao;
    public static $totalContas;

    public $totalSaquesNaoPermitidos;
    public static $operacaoNaoRealizada;
    
    public function __construct($titular, $agencia, $numero, $saldo) {
        $this->$titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;



        self::$totalContas++;
        
        try {
            if(self::$totalContas < 1) {
               throw new Exception('Valor inferior a um!');
            }
            self::$taxaOperacao  = 30 / self::$totalContas;
        } catch(Exception $error) {
            echo $error->getMessage();
            exit;
        }
    }

    public function __get($atributo) {
        // Validacao::protegeAtributo($atributo);

        return $this->atributo;
    }

    public function __set($atributo, $valor) {
        // Validacao::protegeAtributo($atributo);

        $this->atributo = $valor;
    }

    public function transferir($valor, ContaCorrente $contaCorrente) {
        try {
            $arquivo = new LeitorArquivo('logTransferencia.txt');

            $arquivo->abreArquivo();
            $arquivo->escreverArquivo();
        
            if(!is_numeric($valor)) {
                throw new \InvalidArgumentException('O valor passado não é número');
            }

            if($valor < 0) {
                throw new \Exception('O valor não é permitido.');
            }

            $this->sacar($valor);
            $contaCorrente->depositar($valor);
           
            return $this;
        } catch(\Exception $e) {
            ContaCorrente::$operacaoNaoRealizada++;
            throw new OperacaoNaoRealizadaException("Operação não realizada", 55, $e);
        }finally {
            $arquivo->fecharArquivo();
        }
    }

    public function sacar(float $valor) {

        if($valor > $this->saldo) {
            throw new \exception\SaldoInsuficienteException('saldo insuficiente', $valor, $this->saldo);
        }
        $this->saldo -= $valor;
    }

    public function depositar(float $valor) {
        $this->saldo += $valor;
    }
}