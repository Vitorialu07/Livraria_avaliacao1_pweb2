<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;
class AvaliacaoController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Avaliacao::all(); 
        return view('avaliacao.list', compact('dados'));
    }

    public function create()
    {
        return view('avaliacao.form');
    }

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

    public function store(Request $request)
    {
         $this->validateForm($request);

        Avaliacao::create($request->all());

        return redirect('avaliacao')->with("success", 'Registro Salvo com sucesso!');
    }


    public function edit(int $id)
    {
        $data = Avaliacao::find($id);
        return view('avaliacao.form', compact('data'));
    }

    public function update(Request $request,  int $id)
    {
        $this->validateForm($request);

        Avaliacao::find($id)->update($request->all());

        return redirect('avaliacao')->with("success", 'Registro Atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        Avaliacao::destroy($id);

        return redirect('avaliacao')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Avaliacao::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Avaliacao::All();
        }

        return view('avaliacao.list', compact('dados'));
    }
}
