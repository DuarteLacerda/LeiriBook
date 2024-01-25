<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LivroCategoriaController extends Controller
{
    //
    public function index(Livro $livro)
    {
        //
         // Retrieve the specific book and its associated genres/categories
         $livro = Livro::with('categorias')->find($livro->id);

         // Pass the data to the view
         return view('livroscategorias.index', compact('livro'));
    }
}
