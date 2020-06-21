<?php

spl_autoload_register(function(string $nomeClasse) {
    // Alura\Banco\Modelo\Endereco
    // src/Modelo/Endereco.php

    $caminhoClasse = str_replace('Alura\\Banco', 'src', $nomeClasse);
    $caminhoClasse .= ".php";

    if(file_exists($caminhoClasse)) {
        require_once $caminhoClasse;
    }
});