<?php

namespace App\Http\Controllers;

use App\Models\Livraria;
use App\Models\CategoriaLivro;
use Illuminate\Http\Request;

class LivrariaController extends Controller
{
    public function index()
    {
        $dados = Livraria::all(); 
        return view('livraria.list', compact('dados'));
    }

    function create()
    {
        $categorias= CategoriaLivro::orderBy('categoria')->get();
        return view('livraria.form', compact('categorias'));
    }


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

    function store(Request $request)
    {
        //dd($request->all());
        $this->validateForm($request);

        Livraria::create($request->all());

        return redirect('livraria')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit(int $id)
    {
        $data = Livraria::find($id);
        $categorias = CategoriaLivro::all();
        return view('livraria.form', compact('data', 'categorias'));
     
    }


    function update(Request $request,  int $id)
    {
        $this->validateForm($request);

        Livraria::find($id)->update($request->all());

        return redirect('livraria')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy(int $id)
    {
        Livraria::destroy($id);

        return redirect('livraria')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Livraria::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Livraria::All();
        }

        return view('livraria.list', compact('dados'));
    }
}
