<?php

namespace Tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;

class PaginaCadastroSeries
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function cadastrarSerie(
        string $nomeSerie,
        int $quantidadeTemporadas,
        int $episodiosPorTemporada,
        string $genero
    ): void
    {
        if ($this->driver->getCurrentURL() !== 'http://localhost:8080/series') {
            $this->driver->get('http://localhost:8080/series');
        }

        $this->driver->findElement(WebDriverBy::linkText('Adicionar'))->click();

        $inputNome = $this->driver->findElement(WebDriverBy::id('nome'));
        $inputGenero = $this->driver->findElement(WebDriverBy::id('genre'));
        $inputQuantidadeTemporadas = $this->driver->findElement(WebDriverBy::id('qtd_temporadas'));
        $inputEpisodiosPorTemporada = $this->driver->findElement(WebDriverBy::id('ep_por_temporada'));

        $inputNome->sendKeys($nomeSerie);
        $inputQuantidadeTemporadas->sendKeys($quantidadeTemporadas);
        $inputEpisodiosPorTemporada->sendKeys($episodiosPorTemporada);

        $selectGenero = new WebDriverSelect($inputGenero);
        $selectGenero->selectByValue($genero);

        $botaoEnviar = $this->driver->findElement(WebDriverBy::cssSelector('button[type="submit"]'));
        $botaoEnviar->submit();
    }
}