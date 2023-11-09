<?php

namespace Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;
use PHPUnit\Framework\TestCase;
use Tests\Infrastructure\WebDriverCreator;
use Tests\PageObject\PaginaCadastroSeries;
use Tests\PageObject\PaginaLogin;

class CadastroSeriesTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        // Arrange
        self::$driver = WebDriverCreator::createWebDriver();

        $paginaLogin = new PaginaLogin(self::$driver);
        $paginaLogin->realizaLoginCom('email@example.com', '123');
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->quit();
    }

    public function testCadastrarNovaSerieDeveRedirecionarParaLista()
    {
        $paginaCadastroSeries = new PaginaCadastroSeries(self::$driver);
        $paginaCadastroSeries->cadastrarSerie(
            'Testando selenium',
            2,
            4,
            'acao'
        );

        // Assert
        $this->assertSame('http://localhost:8080/series', self::$driver->getCurrentURL());
        $this->assertSame(
            'Série com suas respectivas temporadas e episódios adicionada.',
            trim(self::$driver->findElement(WebDriverBy::cssSelector('div.alert.alert-success'))->getText())
        );
    }
}
