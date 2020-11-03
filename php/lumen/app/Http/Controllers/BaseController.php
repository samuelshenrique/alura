<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected string $classe;


    public function index(Request $request)
    {

        // var_dump($request->page);
        // var_dump($request->per_page);
        $offset = ($request->page - 1) * $request->per_page;
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()
            ->json('', 404);
        }

        return response()
            ->json($recurso, 200);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()
                ->json([
                    'erro' => 'Recurso não encontrado'
                ], 204);
        }

        $recurso->fill(
            $request->all()
        );
        $recurso->save();

        return response()
            ->json($recurso, 200);

    }

    public function destroy(int $id)
    {
        $recursosRemovidos = $this->classe::destroy($id);

        if($recursosRemovidos === 0) {
            return response()
            ->json([
                'erro' => 'Recurso não encontrado'
                ], 404);
        }

        return response()
            ->json([
                'successo' => 'Série removida com sucesso'
                ], 200);
    }
}