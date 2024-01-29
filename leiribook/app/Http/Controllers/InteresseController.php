<?php

namespace App\Http\Controllers;

use App\Models\Interesse;

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

    public function store($livroId)
    {
        // Check if an existing interesse for the user and livro_id exists
        $existingInteresse = Interesse::where('user_id', auth()->id())
            ->where('livro_id', $livroId)
            ->first();

        if ($existingInteresse) {
            // Update the existing interesse
            $existingInteresse->update([
                'data_leitura' => now(), // Assuming you want to update the date
                'estado' => 'lido', // Replace with the actual estado
                // Include any other necessary fields for the update operation
            ]);
        } else {
            // Create a new interesse with 'lido' state
            Interesse::create([
                'data_leitura' => now(), // Assuming you want to set the date to now
                'estado' => 'lido',
                'livro_id' => $livroId,
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->route('interesses.index')->with('success', 'Interesse criado com sucesso!');
    }


    public function updateState($livroId, Request $request)
    {
        // Validate the request if necessary

        // Check if an existing interesse for the user and livro_id exists
        $existingInteresse = Interesse::where('user_id', auth()->id())
            ->where('livro_id', $livroId)
            ->first();

        if ($existingInteresse) {
            // Update the existing interesse
            $existingInteresse->update([
                'data_leitura' => now(), // Assuming you want to update the date
                'estado' => $request->input('estado'), // Assuming you send 'estado' in the request
                // Include any other necessary fields for the update operation
            ]);
        } else {
            // Create a new interesse
            Interesse::create([
                'data_leitura' => now(), // Assuming you want to set the date to now
                'estado' => $request->input('estado'), // Assuming you send 'estado' in the request
                'livro_id' => $livroId,
                'user_id' => auth()->id(),
            ]);
        }

        return response()->json(['success' => true]);
    }


    public function edit(Interesse $interesse)
    {
        return view('interesses.edit', compact('interesse'));
    }

    public function update(Interesse $interesse)
    {
        // Check if the authenticated user owns the interesse
        if (auth()->id() == $interesse->user_id) {
            // Check if the interesse state is changing to 'não lido'
            if ($interesse->estado != 'não lido') {
                // Update the existing interesse
                $interesse->update([
                    'data_leitura' => now(), // Assuming you want to update the date
                    'estado' => 'lido', // Replace with the actual estado
                    // Include any other necessary fields for the update operation
                ]);
            } else {
                // Delete the 'não lido' interesse
                $interesse->delete();
            }
        }

        return redirect()->route('interesses.index')->with('success', 'Interesse atualizado com sucesso!');
    }

    public function destroy(Interesse $interesse)
    {
        $interesse->delete();
        return redirect()->route('interesses.index')->with('success', 'Interesse eliminado com sucesso!');
    }
}
