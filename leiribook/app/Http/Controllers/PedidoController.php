<?php

// app/Http/Controllers/PedidoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function pedido(Request $request)
    {
        // Validate the form data
        $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'edicao' => 'required|integer',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Handle image upload if provided
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('public/images/imagem_pedidos');
        } else {
            $imagemPath = null;
        }

        // Hardcode user_id for now (replace with actual user ID later)
        $user_id = 1;

        // Store the form data in the database
        Pedido::create([
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'edicao' => $request->input('edicao'),
            'foto' => $imagemPath,
            'user_id' => $user_id,
        ]);

        // Redirect or do additional processing as needed
        return redirect()->back()->with('success', 'Pedido enviado com sucesso!');
    }
}
