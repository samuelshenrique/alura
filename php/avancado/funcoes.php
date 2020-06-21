<?php

echo "arquivos de funcoes aqui" . PHP_EOL;

function sacar(array $conta, float $valorASacar): array {
    if($conta['saldo'] < $valorASacar) {
        exibeMensagem('Você não pode sacar este valor.');
    } else {
        $conta['saldo'] -= $valorASacar;    
    }

    return $conta;
}


function exibeMensagem(string $mensagem) {
    echo $mensagem . PHP_EOL;
}

function depositar(array $conta, float $valorADepositar): array {
    if($valorADepositar < 0) {
        echo "Você não pode depositar um valor negativo";
    } else {
        $conta['saldo'] += $valorADepositar;
    }

    return $conta;
}

function titularComLetrasMaiusculas(array $conta) {
    $conta['titular'] = strtoupper($conta['titular']);
    echo $conta['titular'];
}
?>