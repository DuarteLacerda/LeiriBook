<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function biblioteca()
    {
        // Your logic for fetching books and returning the view goes here
        $livros = Livro::all(); // Adjust the namespace and model name accordingly

        return view('biblioteca', compact('livros'));
    }
}
