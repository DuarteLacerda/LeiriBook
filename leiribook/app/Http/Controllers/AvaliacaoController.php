<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livro;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use App\Http\Requests\AvaliacaoRequest;

class AvaliacaoController extends Controller
{
    public function index()
    {
        //
        $avaliacoes = Avaliacao::all();
        return view('_admin.avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        //
        $avaliacao = new Avaliacao;
        $utilizadores = User::all();
        $livros = Livro::all();
        return view('_admin.avaliacoes.create', compact("avaliacao", "utilizadores", "livros"));
    }


    public function store(AvaliacaoRequest $request)
    {
        $fields = $request->validated();
        $avaliacao = new Avaliacao();
        $avaliacao->fill($fields);
        $avaliacao->save();
        return redirect()->route('admin.avaliacoes.index')->with(
            'success',
            'A Avaliação foi criada com sucesso'
        );
    }


    public function edit(Avaliacao $avaliacao)
    {
        $utilizadores = User::all();
        $livros = Livro::all();
        return view('_admin.avaliacoes.edit', compact('avaliacao', "utilizadores", "livros"));
    }


    public function update(AvaliacaoRequest $request, Avaliacao $avaliacao)
    {
        //
        $fields = $request->validated();
        $avaliacao->fill($fields);
        $avaliacao->save();
        return redirect()->route('admin.avaliacoes.index')->with('success', 'A Avaliação foi atualizada com sucesso');
    }





    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return redirect()->route('admin.avaliacoes.index')->with(
            'success',
            'Avaliação eliminada com sucesso'
        );
    }
}
