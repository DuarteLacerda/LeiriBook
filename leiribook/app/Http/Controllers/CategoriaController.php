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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categoria = new Categoria;
        return view('_admin.categorias.create', compact("categoria"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        $fields = $request->validated();
        //Repare que o conteúdo anterior de validação foi eliminado neste ponto
        $categoria = new Categoria();
        $categoria->fill($fields);
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with(
            'success',
            'Categoria criada com sucesso'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
        return view('_admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        //
        $fields = $request->validated();
        $categoria->fill($fields);
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //

        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with(
            'success',
            'Categoria eliminada com sucesso'
        );
    }
}
