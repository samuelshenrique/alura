<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class PaginaInicialTest extends TestCase
{
    public function testPaginaInicialNaoLogadaDeveSerListagemDeSeries()
    {
        // Arrange
        $host = 'http://localhost:4444';
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome(),);

        // Act
        // $driver->navigate()->to('http://localhost:8080');
        $driver->get('http://localhost:8080');

        // Assert
        $h1Locator = WebDriverBy::tagName('h1');
        $textoH1 = $driver->findElement($h1Locator)->getText();

        // $textoBotaoAdicionar = $driver
        //     ->findElement(WebDriverBy::cssSelector('a.btn.btn-dark.mb-2'))
        //     ->getText();

        // $textoBotaoAdicionar = $driver
        //     ->findElement(WebDriverBy::xpath('//a[@class="btn btn-dark mb-2"]'))
        //     ->getText();

        // $textoBotaoAdicionar = $driver
        //     ->findElement(WebDriverBy::linkText('Adicionar'))
        //     ->getText();

        $textoBotaoAdicionar = $driver
        ->findElement(WebDriverBy::partialLinkText('Adicionar'))
        ->getText();


        $this->assertSame('Séries', $textoH1);
        $this->assertSame('Séries', $textoH1);

        // sleep(5);

        $driver->quit();
    }
}