<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $dados = Usuario::all(); 
        return view('usuario.list', compact('dados'));
    }

    function create()
    {
        return view('usuario.form');
    }


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

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Usuario::create($request->all());

        return redirect('usuario')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Usuario::find($id);

        // dd($data);
        //return view('livraria.form')->with(['data' => $data]);
        return view('usuario.form', compact('data'));
    }


    function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateForm($request);

        Usuario::find($id)->update($request->all());

        return redirect('usuario')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Usuario::destroy($id);

        return redirect('usuario')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Usuario::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Usuario::All();
        }

        return view('usuario.list', compact('dados'));
    }
}
