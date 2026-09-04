@extends('main')
@section('titulo', 'Formulário da Livraria Acácia')
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
            <label for="nome">Título</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
        </div>
        <div class="col-6">
            <label for="valor">Valor</label>
            <input type="valor" name="valor" class="form-control" value="{{ old('valor', $data->valor ?? '') }}">
        </div>
        <div class="col-6">
            <label for="autor">Autor(a)</label>
            <input type="text" name="autor" class="form-control"
                value="{{ old('autor', $data->autor ?? '') }}">
        </div>
        <div class="col-6">
            <label for="genero">Gênero literário</label>
            <input type="text" name="genero" class="form-control"
                value="{{ old('genero', $data->genero ?? '') }}">
        </div>

        <div class="col-6">
            <label for="categoria_id">Categoria especial</label>
            <select name="categoria_id" class="form-select">
                @foreach($categorias as $item)
                <option value="{{$item->id}}"
                    {{old ('categoria_id', $data->categoria_id ?? '') ==
                    $item->id ? 'selected' : ''}}>
                    {{$item->categoria}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ url('livraria') }}" class="btn btn-primary"> Voltar</a>
        </div>
    </form>
</div>
@stop