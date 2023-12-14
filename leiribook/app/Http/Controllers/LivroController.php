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
    // LivroController.php
public function filterByGenre(Request $request)
{
    // Fetch all categories from the database
    $categorias = Categoria::all();

    // Check if a genre is selected for filtering
    if ($request->has('genre')) {
        $genre = $request->input('genre');

        // If the selected genre is "All Genres," fetch all books without applying any filter
        if ($genre === 'all') {
            return redirect()->route('biblioteca', ['genre' => 'all']);
        } else {
            // Handle the filtering logic for the selected genre
            $livros = Livro::whereHas('categorias', function ($query) use ($genre) {
                $query->where('nome', $genre);
            })->get();
        }
    } else {
        // Fetch all books without applying any filter when no genre is selected
        $livros = Livro::all();
        $genre = 'all'; // Set a default value for $genre
    }

    // Pass categories and books to the 'biblioteca' view along with the selected genre
    return view('biblioteca', compact('livros', 'categorias', 'genre'));
}


}
