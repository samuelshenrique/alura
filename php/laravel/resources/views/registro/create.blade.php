@extends('layout')

@section('cabecalho')
    Cadastre-se
@endsection

@section('conteudo')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" required="required" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required="required" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" name="password" required="required" id="password" min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
    </form>
@endsection