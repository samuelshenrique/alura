<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeSerieTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $serie;

    public function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();

        $this->serie = $criadorDeSerie->criarSerie(
            'Nome da Série',
            1,
            2
        );
    }

    public function testRemoverUmaSerie()
    {
        $removedorDeSerie = new RemovedorDeSerie();

        $nomeDaSerie = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeDaSerie);
        $this->assertEquals('Nome da Série', $this->serie->nome);
        $this->assertDatabaseMissing('series', [
            'id' => $this->serie->id
        ]);
    }
}
