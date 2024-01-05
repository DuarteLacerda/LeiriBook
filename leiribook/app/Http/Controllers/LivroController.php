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
    public function livro_detalhe($id)
    {
        // Retrieve the Livro with selected columns and its related categories
        $livro = Livro::select('titulo', 'descricao', 'autor', 'foto', 'edicao')
            ->with('categorias:name') // Select only the 'nome' column from the 'categorias' table
            ->find($id);

        // If the Livro with the given ID is not found, handle accordingly
        if (!$livro) {
            // Handle not found, redirect, show an error, etc.
            return redirect()->route('biblioteca')->with('error', 'Livro não encontrado');
        }

        // Access information
        $livroTitulo = $livro->titulo;
        $livroDescricao = $livro->descricao;
        $livroAutor = $livro->autor;
        $livroFoto = $livro->foto;
        $livroEdicao = $livro->edicao;

        // Access related categories as an array
        $categorias = $livro->categorias->pluck('nome')->toArray();

        // Your logic here

        // Example: Return a view with the livro and its categories
        return view('livro_detalhe', compact('livroTitulo', 'livroDescricao', 'livroAutor', 'livroFoto', 'livroEdicao', 'categorias'));
    }


}
