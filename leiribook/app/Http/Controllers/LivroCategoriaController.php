<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;

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

    public function destroy(Livro $livro, Categoria $categoria)
    {
        //

        $livro->categorias()->detach($categoria->id);

        return redirect()->route('admin.livros_categorias.index', ['id' => $livro->id])
            ->with('success', 'Categoria removida com sucesso do livro');
    }
}
