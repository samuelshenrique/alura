<?php

namespace Alura\Leilao\Tests\Integration\Dao;

use Alura\Leilao\Dao\Leilao as LeilaoDao;
use Alura\Leilao\Infra\ConnectionCreator;
use Alura\Leilao\Model\Leilao;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{
    private \PDO $pdo;

    public function setUp(): void
    {
        $this->pdo = ConnectionCreator::getConnection();
        $this->pdo->beginTransaction();
        $this->pdo->exec('DELETE FROM leiloes;');
    }

    public function testInsercaoEBuscaDevemFuncionar()
    {
        // Arrange
        $leilao = new Leilao('Variant 0KM');
        $leilaoDao = new LeilaoDao($this->pdo);

        // Act
        $leilaoDao->salva($leilao);
        $leiloes = $leilaoDao->recuperarNaoFinalizados();

        // Assert
        $this->assertCount(1, $leiloes);
        $this->assertContainsOnlyInstancesOf(Leilao::class, $leiloes);
        $this->assertSame(
            'Variant 0KM',
            $leiloes[0]->recuperarDescricao()
        );
    }

    public function tearDown(): void
    {
        // Tear down
        $this->pdo->rollBack();
    }
}
