<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios): Serie
    {
        $serie = null;

        DB::beginTransaction();
        $serie = Serie::create([
            'nome' => $nomeSerie
        ]);

        $this->criarTemporada($serie, $qtdTemporadas, $qtdEpisodios);
        DB::commit();

        return $serie;
    }

    private function criarTemporada(Serie $serie, int $qtdTemporadas, int $qtdEpisodios): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create([
                'numero' => $i
            ]);

            $this->criarEpisodio($temporada, $qtdEpisodios);
        }
    }

    private function criarEpisodio(Temporada $temporada, int $qtdEpisodios): void
    {
        for ($j = 1; $j <= $qtdEpisodios; $j++) {
            $temporada->episodios()->create([
                'numero' => $j
            ]);
        }
    }
}
