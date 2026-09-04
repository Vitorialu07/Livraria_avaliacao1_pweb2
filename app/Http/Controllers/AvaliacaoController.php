<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    // Puxa tudo do banco de dados e abre a tela de listagem
    public function index()
    {
        $dados = Avaliacao::all(); 
        return view('avaliacao.list', compact('dados'));
    }

    // Só abre o formulário para criar um registro novo
    public function create()
    {
        return view('avaliacao.form');
    }

    // Função interna só para não ter que repetir as regras de validação no store e no update
    function validateForm(Request $request)
    {
        $request->validate([
            'livro' => 'required',
            'avaliacao' => 'required',
        ], [
            'livro.required' => "O :attribute é obrigatorio",
            'avaliacao.required' => "O :attribute é obrigatorio"
        ]);
    }

    // Recebe o formulário preenchido, valida e salva um novo registro no banco
    public function store(Request $request)
    {
        $this->validateForm($request);

        Avaliacao::create($request->all());

        return redirect('avaliacao')->with("success", 'Registro Salvo com sucesso!');
    }

    // Busca uma avaliação específica pelo ID e abre o formulário preenchido com as informações dela
    public function edit(int $id)
    {
        $data = Avaliacao::find($id);
        return view('avaliacao.form', compact('data'));
    }

    // Salva as alterações feitas no formulário de edição
    public function update(Request $request, int $id)
    {
        $this->validateForm($request);

        Avaliacao::find($id)->update($request->all());

        return redirect('avaliacao')->with("success", 'Registro Atualizado com sucesso!');
    }

    // Deleta a avaliação do banco usando o ID
    public function destroy(int $id)
    {
        Avaliacao::destroy($id);

        return redirect('avaliacao')->with("success", 'Registro removido com sucesso!');
    }

    // Filtra a busca do usuário no banco usando LIKE (%termo%) baseando-se no campo escolhido
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Avaliacao::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            // Se o usuário clicou em buscar mas deixou o campo vazio, só retorna tudo de novo
            $dados = Avaliacao::All();
        }

        return view('avaliacao.list', compact('dados'));
    }
}