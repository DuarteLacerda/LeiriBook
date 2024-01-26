<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\LivroCategoria;
use App\Http\Requests\LivrosCategoriasRequest;

class LivroCategoriaController extends Controller
{
    //
    public function index($id)
    {
        //
        // Retrieve the specific book and its associated genres/categories
        $livro = Livro::with('categorias')->find($id);

        // Pass the data to the view
        return view('_admin.livros_categorias.index', compact('livro'));
    }

    public function create($livroId){

        // Get the livro
    $livro = Livro::with('categorias')->find($livroId);

    // Get all categories
    $allCategorias = Categoria::all();

    // Get the categories that the livro doesn't have
    $categoriasNotInLivro = $allCategorias->diff($livro->categorias);

    // Pass the data to the view
    return view('_admin.livros_categorias.create', compact('livro', 'categoriasNotInLivro'));

    }

    public function store(LivrosCategoriasRequest $request, $livroId)
{
    $validatedData = $request->validated();

    // Create a new LivroCategoria instance
    $livroCategoria = new LivroCategoria();
    $livroCategoria->livro_id = $livroId;
    $livroCategoria->categoria_id = $validatedData['categoria_id'];
    $livroCategoria->save();
    return redirect()->route('admin.livros_categorias.index', ['id' => $livroId])
        ->with('success', 'Género adicionado com sucesso ao livro.');
}

    public function destroy(Livro $livro, Categoria $categoria)
    {
        //

        $livro->categorias()->detach($categoria->id);

        return redirect()->route('admin.livros_categorias.index', ['id' => $livro->id])
            ->with('success', 'Categoria removida com sucesso do livro');
    }
}
