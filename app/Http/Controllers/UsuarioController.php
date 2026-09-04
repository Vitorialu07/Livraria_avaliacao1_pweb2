<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Busca todos os usuários do banco e manda pra tela de listagem
    public function index()
    {
        $dados = Usuario::all(); 
        return view('usuario.list', compact('dados'));
    }

    // Só abre a tela com o formulário em branco pra cadastrar um usuário novo
    function create()
    {
        return view('usuario.form');
    }

    // Função interna que garante que nenhum campo importante (nome, CPF, endereço, email e telefone) fique em branco
    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'cpf.required' => "O :attribute é obrigatorio",
            'endereco.required' => "O :attribute é obrigatorio",
            'email.required' => "O :attribute é obrigatorio",
            'telefone.required' => "O :attribute é obrigatorio"
        ]);
    }

    // Passa pelos testes de validação e salva os dados do novo usuário no banco
    function store(Request $request)
    {
        //dd($request->all()); // Usado apenas para testar o envio das informações se der ruim
        $this->validateForm($request);

        Usuario::create($request->all());

        return redirect('usuario')->with("success", 'Registro Salvo com sucesso!');
    }

    // Pega as informações do usuário pelo ID e abre o formulário preenchido com elas pra poder alterar
    function edit($id)
    {
        $data = Usuario::find($id);

        // dd($data);
        // return view('livraria.form')->with(['data' => $data]); // Código antigo/comentado que sobrou de outro controller
        return view('usuario.form', compact('data'));
    }

    // Valida os dados e salva o cadastro atualizado do usuário no banco
    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Usuario::find($id)->update($request->all());

        return redirect('usuario')->with("success", 'Registro Atualizado com sucesso!');
    }

    // Exclui o usuário do banco usando o ID dele
    function destroy($id)
    {
        Usuario::destroy($id);

        return redirect('usuario')->with("success", 'Registro removido com sucesso!');
    }

    // Realiza a busca no banco pelo campo selecionado ou devolve a lista inteira se o campo estiver vazio
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Usuario::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            // Se pesquisar sem digitar nada, só recarrega a lista completa
            $dados = Usuario::All();
        }

        return view('usuario.list', compact('dados'));
    }
}