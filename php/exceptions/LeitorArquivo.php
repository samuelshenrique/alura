<?php

class LeitorArquivo {

    private string $arquivo;



    public function __construct($arquivo) {
        $this->arquivo = $arquivo;    
    }

    public function abreArquivo() {
        // fopen($this->arquivo, 'r');
        echo 'Abre arquivo<br>';
    }

    public function lerArquivo() {
        echo 'Lê arquivo<br>';
    }

    public function escreverArquivo() {
        echo 'Escreve arquivo<br>';
    }

    public function fecharArquivo() {
        echo 'Fecha arquivo<br>';
    }
}

?>