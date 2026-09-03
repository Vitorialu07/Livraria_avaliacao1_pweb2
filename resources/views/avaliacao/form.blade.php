@extends('main')
@section('titulo', 'Formulário de Avaliações')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('avaliacao.update', $data->id);
            } else {
                $action = route('avaliacao.store');
            }
        @endphp

        <h4>Insira sua avaliação:</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="livro">Título do livro</label>
                <input type="text" name="livro" class="form-control" value="{{ old('livro', $data->livro ?? '') }}">
            </div>
            <div class="col-6">
                <label for="cpf">Autor</label>
                <input type="text" name="autor" class="form-control" value="{{ old('autor', $data->autor ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data">Data de fim da leitura</label>
                <input type="date" name="data" class="form-control" value="{{ old('data', $data->data ?? '') }}">
            </div>
            <div class="col-6">
                <label for="avaliacao">O que achei do livro: </label>
                <input type="text" name="avaliacao" class="form-control"value="{{ old('avaliacao', $data->avaliacao ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('livraria') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
