<?php

namespace Tests;

use Facebook\WebDriver\WebDriver;
use PHPUnit\Framework\TestCase;
use Tests\Infrastructure\WebDriverCreator;
use Tests\PageObject\PaginaListagemSeries;
use Tests\PageObject\PaginaLogin;

class PaginaListagemTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        self::$driver = WebDriverCreator::createWebDriver();

        $paginaLogin = new PaginaLogin(self::$driver);
        $paginaLogin->realizaLoginCom(
            'email@example.com',
            '123'
        );
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->quit();
    }

    public function testAlterarNomeDeSeriado()
    {
        $paginaListagem = new PaginaListagemSeries(self::$driver);
        $paginaListagem->abrirListagemDeSeries();

        $nomeSeriadoAlterado = 'Seriado Alterado';
        $idSeriadoAlterado = 21;
        $paginaListagem
            ->clicaEmEditarSerieComId($idSeriadoAlterado)
            ->defineNomeDaSerieComId($idSeriadoAlterado, $nomeSeriadoAlterado)
            ->finalizaEdicao($idSeriadoAlterado);

        $this->assertSame(
            $nomeSeriadoAlterado,
            $paginaListagem->nomeSeriado($idSeriadoAlterado)
        );
    }
}