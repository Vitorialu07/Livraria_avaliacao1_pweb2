@extends('main')
@section('titulo', 'Listagem de Livraria')
@section('conteudo')
    <div class="row">

        <h3>Listagem de Livraria</h3>
        <form action="{{ route('livraria.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="nome">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="valor">Preço</option>
                        <option value="autor">Autor</option>
                        <option value="genero">Genero</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('livraria/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>


    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->valor }}</td>
                        <td>{{ $item->autor }}</td>
                        <td>{{ $item->genero }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('livraria.edit', $item->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('livraria.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Exclur'
                                    onclick='return confirm(\"Deseja Excluir?\")'>Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
