<?php

// app/Http/Controllers/InteresseController.php

namespace App\Http\Controllers;

use App\Models\Interesse;
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
}
