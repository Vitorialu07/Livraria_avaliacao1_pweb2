<?php

namespace App\Http\Controllers;

use App\Models\Livraria;
use App\Models\CategoriaLivro;
use Illuminate\Http\Request;

class LivrariaController extends Controller
{
    // Puxa todos os livros/itens cadastrados no banco e carrega na tela de listagem
    public function index()
    {
        $dados = Livraria::all(); 
        return view('livraria.list', compact('dados'));
    }

    // Busca as categorias em ordem alfabética e abre a tela de cadastro para o usuário preencher
    function create()
    {
        $categorias = CategoriaLivro::orderBy('categoria')->get();
        return view('livraria.form', compact('categorias'));
    }

    // Função interna para conferir se os campos obrigatórios (nome e valor) foram preenchidos
    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'valor.required' => "O :attribute é obrigatorio"
        ]);
    }

    // Valida os dados enviados do formulário e salva o novo item direto no banco
    function store(Request $request)
    {
        //dd($request->all()); // Esse dd tava aqui só pra debugar os dados se precisasse
        $this->validateForm($request);

        Livraria::create($request->all());

        return redirect('livraria')->with("success", 'Registro Salvo com sucesso!');
    }

    // Procura o item pelo ID e carrega o formulário com os dados dele + a lista de categorias pra alterar
    function edit(int $id)
    {
        $data = Livraria::find($id);
        $categorias = CategoriaLivro::all();
        return view('livraria.form', compact('data', 'categorias'));
    }

    // Valida as alterações feitas e atualiza o item existente no banco
    function update(Request $request, int $id)
    {
        $this->validateForm($request);

        Livraria::find($id)->update($request->all());

        return redirect('livraria')->with("success", 'Registro Atualizado com sucesso!');
    }

    // Apaga o registro do banco de dados pelo ID
    function destroy(int $id)
    {
        Livraria::destroy($id);

        return redirect('livraria')->with("success", 'Registro removido com sucesso!');
    }

    // Faz uma busca filtrada no banco usando o termo digitado ou recarrega tudo se a busca estiver vazia
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Livraria::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            // Se o usuário clicou em buscar mas não digitou nada, só puxa tudo de volta
            $dados = Livraria::All();
        }

        return view('livraria.list', compact('dados'));
    }
}