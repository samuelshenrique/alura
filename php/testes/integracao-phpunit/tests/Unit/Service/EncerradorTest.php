<?php

namespace Alura\Tests\Unit\Service;

use Alura\Leilao\Dao\Leilao as DaoLeilao;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\Encerrador;
use Alura\Leilao\Service\EnviadorEmail;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EncerradorTest extends TestCase
{
    private $encerrador;
    /** @var MockObject|DaoLeilao $leilaoDao */
    private $leilaoDao;
    /** @var MockObject|EnviadorEmail $enviadorEmail */
    private $enviadorEmail;

    protected function setUp(): void
    {
        $fiat147 = new Leilao(
            'Fiat 147 0KM',
            new \DateTimeImmutable('8 days ago'),
        );

        $variant = new Leilao(
            'Variant 1972 0KM',
            new \DateTimeImmutable('10 days ago')
        );

        /** @var MockObject|DaoLeilao $leilaoDao */
        $this->leilaoDao = $this->createMock(DaoLeilao::class);
        // $this->leilaoDao = $this->getMockBuilder(DaoLeilao::class)
        //     ->setConstructorArgs([new PDO('sqlite::memory:')])
        //     ->getMock();
        $this->leilaoDao->method('recuperarNaoFinalizados')->willReturn([$fiat147, $variant]);
        $this->leilaoDao->method('recuperarFinalizados')->willReturn([$fiat147, $variant]);
        $this->leilaoDao->expects($this->exactly(2))
            ->method('atualiza');
            // ->with($fiat147);

        $this->enviadorEmail = $this->createMock(EnviadorEmail::class);
        $this->encerrador = new Encerrador($this->leilaoDao, $this->enviadorEmail);
    }

    public function testLeiloesComMaisDeUmaSemanaDevemSerEncerrados()
    {
        $this->encerrador->encerra();

        // Assert
        $leiloes = $this->leilaoDao->recuperarFinalizados();

        $this->assertCount(2, $leiloes);

        $this->assertTrue($leiloes[0]->estaFinalizado());
        $this->assertTrue($leiloes[1]->estaFinalizado());

        $this->assertEquals(
            'Fiat 147 0KM',
            $leiloes[0]->recuperarDescricao()
        );

        $this->assertEquals(
            'Variant 1972 0KM',
            $leiloes[1]->recuperarDescricao()
        );
    }

    public function testDeveContinuarProcessamentoAoEncontrarErroAoEnviarEmail()
    {
        // $e = new \DomainException('Erro ao enviar e-mail');
        $this->enviadorEmail->expects($this->exactly(2))
            ->method('notificarTerminoLeilao');
            // ->willThrowException($e);
        $this->encerrador->encerra();
    }

    public function testSoDeveEnviarLeilaoPorEmailAposFinalizado()
    {
        $this->enviadorEmail->expects($this->exactly(2))
            ->method('notificarTerminoLeilao')
            ->willReturnCallback(function (Leilao $leilao) {
                $this->assertTrue($leilao->estaFinalizado());
            });

        $this->encerrador->encerra();
    }
}