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

        if ($request->input('estado') === 'não lido') {
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
}
