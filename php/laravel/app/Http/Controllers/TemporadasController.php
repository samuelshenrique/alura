<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = new Serie();

        $nomeSerie = $serie->find($serieId);

        $temporadas = $nomeSerie->temporadas;

        return view('temporadas.index', [
            'serie' => $nomeSerie,
            'temporadas' => $temporadas
        ]);
    }
}
