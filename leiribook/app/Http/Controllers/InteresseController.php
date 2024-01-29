<?php

// app/Http/Controllers/InteresseController.php

namespace App\Http\Controllers;

use App\Models\Interesse;
use Illuminate\Http\Request;
use App\Http\Requests\InteresseRequest;

class InteresseController extends Controller
{
    public function index()
    {
        $interesses = Interesse::all();
        return view('interesses.index', compact('interesses'));
    }

    public function create()
    {
        // Add any necessary data for the create view
        return view('interesses.create');
    }

    public function store(InteresseRequest $request)
    {
        Interesse::create($request->validated());
        return redirect()->route('interesses.index')->with('success', 'Interesse criado com sucesso!');
    }

    public function edit(Interesse $interesse)
    {
        return view('interesses.edit', compact('interesse'));
    }

    public function update(InteresseRequest $request, Interesse $interesse)
    {
        $interesse->update($request->validated());
        return redirect()->route('interesses.index')->with('success', 'Interesse atualizado com sucesso!');
    }

    public function destroy(Interesse $interesse)
    {
        $interesse->delete();
        return redirect()->route('interesses.index')->with('success', 'Interesse eliminado com sucesso!');
    }

    public function list(){
        $user = auth()->user();
        $livrosUser = $user->interesses()->with('livro')->get();
        $interesses = Interesse::all();
        $selectedEstado = "all";
        return view('lista_leitura', compact('livrosUser','interesses','selectedEstado'));

    }
    public function filterByInteresse(Request $request)
{
    // Get the authenticated user
    $user = auth()->user();

    // Get the selected estado from the form
    $selectedEstado = $request->input('estado');

    // If "all" is selected, retrieve all books without applying the estado filter
    if ($selectedEstado === 'all') {
        $livrosUser = $user->interesses()->with('livro')->get();
    } else {
        // Otherwise, retrieve books based on the selected estado
        $livrosUser = $user->interesses()->where('estado', $selectedEstado)->with('livro')->get();
    }

    // Get all interests for the filter dropdown
    $interesses = Interesse::all();

    // Return the view with the filtered results
    return view('lista_leitura', compact('livrosUser', 'interesses','selectedEstado'));
}
}
