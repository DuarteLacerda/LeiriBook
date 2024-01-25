<?php

// app/Http/Controllers/PedidoController.php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Storage;

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
            $imagemPath = $request->file('imagem')->store('images/imagem_pedidos', 'public');
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

    public function showPedidos()
    {
        $pedidos = Pedido::with('usuario')->get();

        return view('pedidos', compact('pedidos'));
    }


    //back-end
    public function index()
    {
        //
        $pedidos = Pedido::all();
        return view('_admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
        return view('_admin.pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PedidoRequest $request, Pedido $pedido)
    {
        //
        $fields = $request->validated();
        $pedido->fill($fields);
        if ($request->hasFile('foto')) {

            if ($pedido->foto == basename($request->file('foto'))) {
                Storage::disk('public')->delete('images/imagem_pedidos/' . $pedido->foto);
            }
            $photo_path = $request->file('foto')->store('public/users_photos');
            $pedido->foto = basename($photo_path);
        }
        $pedido->save();
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
        Storage::disk('public')->delete('images/imagem_pedidos/' . $pedido->foto);
        $pedido->delete();
        return redirect()->route('admin.pedidos.index')->with(
            'success',
            'Pedido eliminado com sucesso'
        );
    }
}
