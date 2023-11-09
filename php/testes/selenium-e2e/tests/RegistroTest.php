<?php

namespace Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;
use Tests\Infrastructure\WebDriverCreator;

class RegistroTest extends TestCase
{
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        self::$driver = WebDriverCreator::createWebDriver();
    }

    public function setUp(): void
    {
        self::$driver->get('http://localhost:8080/novo-usuario');
    }

    public static function tearDownAfterclass(): void
    {
        self::$driver->quit();
    }

    public function testQuandoRegistrarNovoUsuarioDeveRedirecionarParaListaDeSeries()
    {

        // Act
        $inputNome = self::$driver->findElement(WebDriverBy::id('name'));
        $inputEmail = self::$driver->findElement(WebDriverBy::id('email'));
        $inputSenha = self::$driver->findElement(WebDriverBy::id('password'));

        $inputNome->sendKeys('Samuel Santos Henrique');
        $inputEmail->sendKeys(md5(time()) . '@example.com');
        $inputSenha->sendKeys('123');

        $submitBotao = self::$driver->findElement(WebDriverBy::cssSelector('button[type="submit"]'));
        $submitBotao->submit();

        // Assert
        $this->assertSame('http://localhost:8080/series', self::$driver->getCurrentURL());
        $this->assertInstanceOf(
            RemoteWebElement::class,
            self::$driver->findElement(WebDriverBy::linkText('Sair'))
        );
    }
}