<?php

include 'funcoes.php';

$contasCorrentes = [
    [
        'titular' => "Samuel",
        'saldo' => 1000
    ],
    [
        'titular' => 'Luciano',
        'saldo' => 300
    ],
    [
        'titular' => 'Raphael',
        'saldo' => 2000
    ]
];

$contasCorrentes[0] = sacar($contasCorrentes[0], 400);

titularComLetrasMaiusculas($contasCorrentes[0]);

unset($contasCorrentes[1]);


foreach($contasCorrentes as $id => $conta) {
    ['titular' => $titular, 'saldo' => $saldo] = $conta;
    exibeMensagem("$id {$conta['titular']} Saldo: {$conta['saldo']}");
    exibeMensagem('Com List agora');
    exibeMensagem("$titular e $saldo");
}

?>

<html>
<head>
    <title></title>
</head>
<body>
    <dl>
        <?php foreach($contasCorrentes as $cpf=>$conta) { ?>
        <dt>
            <h3><?= $conta['titular']; ?> - <?= $cpf; ?></h3>
        </dt>
        <dd>
            Saldo: <?= $conta['saldo']; ?>
        </dd>
        <?php } ?>
    </dl>
</body>
</html>