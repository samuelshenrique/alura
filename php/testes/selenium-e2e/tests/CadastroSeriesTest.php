<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;
use PHPUnit\Framework\TestCase;
use Tests\Infrastructure\WebDriverCreator;

class CadastroSeriesTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        // Arrange
        self::$driver = WebDriverCreator::createWebDriver();
        self::$driver->get('http://localhost:8080/entrar');
        
        // Act

        // tela de login
        $inputEmailLogin = self::$driver->findElement(WebDriverBy::id('email'));
        $inputPasswordLogin = self::$driver->findElement(WebDriverBy::id('password'));

        $inputEmailLogin->sendKeys('email@example.com');
        $inputPasswordLogin->sendKeys('123');
        $inputPasswordLogin->submit();
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->quit();
    }

    public function testCadastrarNovaSerieDeveRedirecionarParaLista()
    {
        self::$driver->findElement(WebDriverBy::linkText('Adicionar'))->click();

        $inputNome = self::$driver->findElement(WebDriverBy::id('nome'));
        $inputGenero = self::$driver->findElement(WebDriverBy::id('genre'));
        $inputQuantidadeTemporadas = self::$driver->findElement(WebDriverBy::id('qtd_temporadas'));
        $inputEpisodiosPorTemporada = self::$driver->findElement(WebDriverBy::id('ep_por_temporada'));

        $inputNome->sendKeys('Teste');
        $inputQuantidadeTemporadas->sendKeys('1');
        $inputEpisodiosPorTemporada->sendKeys('1');

        $selectGenero = new WebDriverSelect($inputGenero);
        $selectGenero->selectByValue('acao');

        $botaoEnviar = self::$driver->findElement(WebDriverBy::cssSelector('button[type="submit"]'));
        $botaoEnviar->submit();

        // Assert
        $this->assertSame('http://localhost:8080/series', self::$driver->getCurrentURL());
        $this->assertSame(
            'Série com suas respectivas temporadas e episódios adicionada.',
            trim(self::$driver->findElement(WebDriverBy::cssSelector('div.alert.alert-success'))->getText())
        );
    }
}