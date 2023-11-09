<?php

namespace Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;
use Tests\Infrastructure\WebDriverCreator;

class PaginaInicialTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        self::$driver = WebDriverCreator::createWebDriver();
    }

    public function setUp(): void
    {
        self::$driver->get('http://localhost:8080');
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->quit();
    }

    public function testPaginaInicialNaoLogadaDeveSerListagemDeSeries()
    {

        // Act
        // self::$driver->navigate()->to('http://localhost:8080');
        
        // Assert
        $h1Locator = WebDriverBy::tagName('h1');
        $textoH1 = self::$driver->findElement($h1Locator)->getText();

        // $textoBotaoAdicionar = self::$driver
        //     ->findElement(WebDriverBy::cssSelector('a.btn.btn-dark.mb-2'))
        //     ->getText();

        // $textoBotaoAdicionar = self::$driver
        //     ->findElement(WebDriverBy::xpath('//a[@class="btn btn-dark mb-2"]'))
        //     ->getText();

        // $textoBotaoAdicionar = self::$driver
        //     ->findElement(WebDriverBy::linkText('Adicionar'))
        //     ->getText();

        $textoBotaoAdicionar = self::$driver
        ->findElement(WebDriverBy::partialLinkText('Adicionar'))
        ->getText();

        $this->assertSame('Séries', $textoH1);
        $this->assertSame('Séries', $textoH1);
    }
}