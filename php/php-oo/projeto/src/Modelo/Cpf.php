<?php

namespace Alura\Banco\Modelo;

class Cpf {
    private $cpf;

    public function __construct(string $cpf) {
        $this->validaCpf($cpf);
        $this->cpf = $cpf;
    }

    private function validaCpf(string $cpf) {
        if(strlen($cpf) < 11) {
            echo PHP_EOL . "CPF não está valido" . PHP_EOL;
            exit;
        }

        echo PHP_EOL . "CPF valido" . PHP_EOL;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}

?>