<?php

spl_autoload_register(function($caminhoCompletoClasses) {
    $caminho = $caminhoCompletoClasses . '.php';
    $caminho = str_replace('\\', DIRECTORY_SEPARATOR, $caminho);
    
    if(file_exists($caminho)) {
        require_once $caminho;
    } else {
        echo "<br>não deu certo <br/>";
    }

});