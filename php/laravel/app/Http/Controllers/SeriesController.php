<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $serie = new Serie();
        $series = $serie->query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
    
        return view('series.index', [
            'series' => $series,
            'mensagem' => $mensagem
        ]);
    }

    public function create(Request $request)
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $qtdTemporadas = $request->qtd_temporadas;
        $qtdEpisodios = $request->ep_por_temporada;

        $serie = Serie::create([
            'nome' => $request->nome
        ]);

        for($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create([
                'numero' => $i
            ]);

            for($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create([
                    'numero' => $j
                ]);
            }
        }

        $request->session()->flash('mensagem', 'Série ' . $serie->id . ' e suas temporadas e episódios criados com sucesso ' . $serie->nome);

        return redirect(route('listar_series'));
    }
    
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            'Serie removida com sucesso'
        );

        return redirect(route('listar_series'));
    }
}
