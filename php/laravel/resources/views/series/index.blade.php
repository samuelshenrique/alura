@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    @auth
    <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
                <span class="d-flex">
                    @auth
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endauth
                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @auth
                    <form method="post" action="series/{{ $serie->id }}" onsubmit="return window.confirm('tem certeza?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(serieId) {
            var nomeSerie = document.getElementById('nome-serie-' + serieId);
            var inputSerie = document.getElementById('input-nome-serie-' + serieId);

            if (nomeSerie.hasAttribute('hidden')) {
                nomeSerie.removeAttribute('hidden');
                inputSerie.hidden = true;
            } else {
                inputSerie.removeAttribute('hidden');
                nomeSerie.hidden = true;

            }
        }

        function editarSerie(serieId) {
            let formData = new FormData();

            var inputNomeSerie = document
                .querySelector('#input-nome-serie-' + serieId + '> input')
                .value;

            const token = document
                .querySelector('input[name="_token"]')
                .value;

            formData.append('nome', inputNomeSerie);
            formData.append('_token', token);

            // enviar para uma rota do laravel

            const url = '/series/' + serieId + '/editaNome';
            //requisicao javascript

            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toggleInput(serieId)
                document.getElementById('nome-serie-' + serieId).textContent = inputNomeSerie
            });


        }
    </script>
@endsection
