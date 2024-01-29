<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use App\Models\Livro;
use Illuminate\Http\Request;

class InteresseController extends Controller
{
    public function updateInteresse($livroId, Request $request)
    {
        // Validate the request if necessary
        $request->validate([
            'estado' => 'required|in:-,lido,a_ler,quero_ler',
        ]);

        // Check if an existing interesse for the user and livro_id exists
        $existingInteresse = Interesse::where('user_id', auth()->id())
            ->where('livro_id', $livroId)
            ->first();

        if ($request->input('estado') === '-') {
            // Delete the existing interesse
            if ($existingInteresse) {
                $existingInteresse->delete();
            }
        } else {
            // Update or create the interesse
            if ($existingInteresse) {
                // Update the existing interesse
                $existingInteresse->update([
                    'data_leitura' => now(),
                    'estado' => $request->input('estado'),
                ]);
            } else {
                // Create a new interesse
                Interesse::create([
                    'data_leitura' => now(),
                    'estado' => $request->input('estado'),
                    'livro_id' => $livroId,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        // Redirect back to the livro_detalhes page
        return redirect()->route('livro_detalhe', ['id' => $livroId])->with('success', 'Interesse atualizado com sucesso!');
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

    public function list()
    {
        $user = auth()->user();
        $livrosUser = $user->interesses()->with('livro')->paginate(9);
        $interesses = Interesse::all();
        $selectedEstado = "all";
        return view('lista_leitura', compact('livrosUser', 'interesses', 'selectedEstado'));

    }
    public function filterByInteresse(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the selected estado from the form
        $selectedEstado = $request->input('estado');

        // If "all" is selected, retrieve all books without applying the estado filter
        if ($selectedEstado === 'all') {
            return redirect()->route('livros.lista_leitura', ['selectedEstado' => 'all']);

        } else {
            // Otherwise, retrieve books based on the selected estado
            $livrosUser = $user->interesses()->where('estado', $selectedEstado)->with('livro')->paginate(9);
        }

        // Get all interests for the filter dropdown
        $interesses = Interesse::all();
        $livrosUser->appends(['estado' => $selectedEstado]);

        // Return the view with the filtered results
        return view('lista_leitura', compact('livrosUser', 'interesses', 'selectedEstado'));
    }
}
