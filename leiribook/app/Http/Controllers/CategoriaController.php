<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view('_admin.categorias.index', compact('categorias'));
    }


    public function create()
    {
        //
        $categoria = new Categoria;
        return view('_admin.categorias.create', compact("categoria"));
    }


    public function store(CategoriaRequest $request)
    {
        $fields = $request->validated();

        $categoria = new Categoria();
        $categoria->fill($fields);
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with(
            'success',
            'Categoria criada com sucesso'
        );
    }


    public function edit(Categoria $categoria)
    {

        return view('_admin.categorias.edit', compact('categoria'));
    }


    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        //
        $fields = $request->validated();
        $categoria->fill($fields);
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso');
    }


    public function destroy(Categoria $categoria)
    {

        $categoria->livros()->detach();
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with(
            'success',
            'Categoria eliminada com sucesso'
        );
    }
}
