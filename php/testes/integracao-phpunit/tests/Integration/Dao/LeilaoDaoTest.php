<?php

namespace Alura\Leilao\Tests\Integration\Dao;

use Alura\Leilao\Dao\Leilao as LeilaoDao;
use Alura\Leilao\Infra\ConnectionCreator;
use Alura\Leilao\Model\Leilao;
use PHPUnit\Framework\TestCase;

class LeilaoDaoTest extends TestCase
{
    private static \PDO $pdo;

    public static function setUpBeforeClass(): void
    {
        self::$pdo = new \PDO('sqlite::memory');
        self::$pdo->exec('CREATE TABLE IF NOT EXISTS leiloes(
            id INTEGER primary key,
            descricao TEXT,
            finalizado BOOL,
            dataInicio TEXT
        );');

        parent::setUpBeforeClass();
    }

    public function setUp(): void
    {
        self::$pdo->beginTransaction();
    }

    /**
     * @dataProvider leiloes
     */
    public function testInsercaoEBuscaDevemFuncionar(array $leiloes)
    {
        $leilaoDao = new LeilaoDao(self::$pdo);

        foreach ($leiloes as $leilao) {
            $leilaoDao->salva($leilao);
        }

        // Act
        $leiloes = $leilaoDao->recuperarNaoFinalizados();

        // Assert
        $this->assertCount(1, $leiloes);
        $this->assertContainsOnlyInstancesOf(Leilao::class, $leiloes);
        $this->assertSame(
            'Variant 0KM',
            $leiloes[0]->recuperarDescricao()
        );
    }

    /** 
     * @dataProvider leiloes
     */
    public function testBuscaLeiloesFinalizados(array $leiloes)
    {
        $leilaoDao = new LeilaoDao(self::$pdo);

        foreach ($leiloes as $leilao) {
            $leilaoDao->salva($leilao);
        }

        $leiloes = $leilaoDao->recuperarFinalizados();

        // Assert
        $this->assertCount(1, $leiloes);
        $this->assertContainsOnlyInstancesOf(Leilao::class, $leiloes);
        $this->assertSame(
            'Fiat 147 0KM',
            $leiloes[0]->recuperarDescricao()
        );
    }

    public function tearDown(): void
    {
        // Tear down
        self::$pdo->rollBack();
    }

    public static function leiloes(): array
    {
        // Arrange
        $leilaoNaoFinalizado = new Leilao('Variant 0KM');

        $leilaoFinalizado = new Leilao('Fiat 147 0KM');
        $leilaoFinalizado->finaliza();

        return [
            [
                [
                    $leilaoNaoFinalizado,
                    $leilaoFinalizado
                ]
            ]
        ];
    }
}
