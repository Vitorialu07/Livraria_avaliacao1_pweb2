@extends('main')
@section('titulo', 'Formulário de Livraria')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('livraria.update', $data->id);
            } else {
                $action = route('livraria.store');
            }
        @endphp

        <h4>Formulário Livraria</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
            </div>
            <div class="col-6">
                <label for="valor">valor</label>
                <input type="valor" name="valor" class="form-control" value="{{ old('valor', $data->valor ?? '') }}">
            </div>
            <div class="col-6">
                <label for="autor">autor</label>
                <input type="text" name="autor" class="form-control"
                    value="{{ old('autor', $data->autor ?? '') }}">
            </div>
            <div class="col-6">
                <label for="genero">genero</label>
                <input type="text" name="genero" class="form-control"
                    value="{{ old('genero', $data->genero ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('livraria') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
