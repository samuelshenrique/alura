<?php

namespace Tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class PaginaListagemSeries
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function abrirListagemDeSeries(): self
    {
        $this->driver->get('http://localhost:8080/series');

        return $this;
    }

    public function clicaEmEditarSeriecomId(int $id): self
    {
        $this->driver
            ->findElement(WebDriverBy::cssSelector('li[data-serie-id="' . $id . '"] span button[onclick="toggleInput(' . $id . ')"]'))
            ->click();

        return $this;
    }

    public function defineNomeDaSerieComId(int $id, string $novoNomeSeriado): self
    {
        $inputNomeSerie = $this->driver
            ->findElement(WebDriverBy::cssSelector('div.input-group.w-50#input-nome-serie-' . $id . ' input'));
        
        $inputNomeSerie->clear();
        $inputNomeSerie->sendKeys($novoNomeSeriado);

        return $this;
    }

    public function finalizaEdicao(int $id): self
    {
        $this->driver
            ->findElement(WebDriverBy::cssSelector('div.input-group.w-50[id="input-nome-serie-' . $id . '"] div.input-group-append button'))
            ->click();
        
        return $this;
    }

    public function nomeSeriado(int $id): string
    {
        $elementoNomeSeriado = $this->driver
            ->findElement(WebDriverBy::cssSelector('li[data-serie-id="' . $id . '"] span#nome-serie-' . $id));
        
        $this->driver
            ->wait()
            ->until(WebDriverExpectedCondition::visibilityOf($elementoNomeSeriado));

        return $elementoNomeSeriado->getText();
    }
}