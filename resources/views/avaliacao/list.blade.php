@extends('main')
@section('titulo', 'Suas Avaliações')
@section('conteudo')
    <div class="row">

        <h3>Lista de Avaliações</h3>
        <form action="{{ route('avaliacao.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="nome">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="livro">Título do livro</option>
                        <option value="autor">Nome do autor</option>
                        <option value="data">Data final da leitura</option>
                        <option value="avaliacao">Avaliação</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('avaliacao/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>


    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título do livro</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Avaliação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->livro }}</td>
                        <td>{{ $item->autor }}</td>
                        <td>{{ $item->data }}</td>
                        <td>{{ $item->avaliacao }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('avaliacao.edit', $item->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('avaliacao.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja Excluir?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
