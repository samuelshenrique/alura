<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;

        return view('episodios.index', [
            'episodios' => $episodios,
            'temporadaId' => $temporada->id,
            'temporadaNome' => $temporada->serie->nome,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        if(!empty($request->episodios)) {
            $episodiosAssistidos = $request->episodios;
        } else {
            $episodiosAssistidos = [];
        }

        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos) {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });

        $temporada->push();

        $request->session()->flash(
            'mensagem',
            'Episódios da série ' . $temporada->serie->nome . ' atualizados com sucesso'
        );

        return redirect()->back();
    }
}
