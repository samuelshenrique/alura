<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Dao\Leilao as LeilaoDao;
use Alura\Leilao\Service\EnviadorEmail as ServiceEnviadorEmail;

class Encerrador
{
    private $dao;
    private $enviadorEmail;

    public function __construct(LeilaoDao $dao, ServiceEnviadorEmail $enviadorEmail)
    {
        $this->dao = $dao;
        $this->enviadorEmail = $enviadorEmail;
    }
    
    public function encerra()
    {
        $leiloes = $this->dao->recuperarNaoFinalizados();

        foreach ($leiloes as $leilao) {
            if ($leilao->temMaisDeUmaSemana()) {
                try {
                    $leilao->finaliza();
                    $this->dao->atualiza($leilao);
                    $this->enviadorEmail->notificarTerminoLeilao($leilao);
                } catch (\DomainException $e) {
                    error_log($e->getMessage());
                }
            }
        }
    }
}
