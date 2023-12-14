<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Models\Categoria;

class LivroController extends Controller
{
    public function biblioteca()
    {
        // Fetch all categories from the "categorias" table
        $categorias = Categoria::all();

        // Fetch all books from the "livros" table
        $livros = Livro::all();

        // Pass both variables to the "biblioteca" view
        return view('biblioteca', compact('categorias', 'livros'));
    }
    public function filterByGenre(Request $request)
    {
        // Get the selected genre from the request
        $genre = $request->input('genre');

        // Check if the default option (All Genres) is selected
        if ($genre === '') {
            // Retrieve all books without applying the genre filter
            $livros = Livro::all();
        } else {
            // Query the books based on the selected genre
            $livros = Livro::whereHas('categorias', function ($query) use ($genre) {
                $query->where('nome', $genre);
            })->get();
        }

        // Pass the filtered books to the 'biblioteca' view
        return view('biblioteca', compact('livros'));
    }

}
