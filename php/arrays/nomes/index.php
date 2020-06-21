<?php

$nomes = "Giovani, João, Maria, Pedro";

$nomes = explode(',', $nomes);

foreach($nomes as $nome) {
    echo $nome;
    echo '<br/>';
}

$newNomes = implode(", ", $nomes);

echo $newNomes;