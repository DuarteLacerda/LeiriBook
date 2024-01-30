<?php

// app/Http/Controllers/PedidoController.php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    public function pedido(PedidoRequest $request)
    {
        // Validate the form data using the PedidoRequest
        $fields = $request->validated();

        // Hardcode user_id for now (replace with actual user ID later)
        $fields['user_id'] = auth()->user()->id;

        $pedido = new Pedido();
        $pedido->fill($fields);

        // Handle image upload if provided
        if ($request->hasFile('foto')) {
            $photo_path = $request->file('foto')->store('public/images/imagem_pedidos');
            $pedido->foto = basename($photo_path);
        }

        // Store the form data in the database
        $pedido->save();

        // Redirect or do additional processing as needed
        return redirect()->back()->with('success', 'Pedido enviado com sucesso!');
    }


    public function showPedidos()
    {
        // $pedidos = Pedido::with('usuario')->get();

        // return view('pedidos', compact('pedidos'));

        $pedidos = Pedido::with('user')->paginate(10);
        return view('pedidos', ['pedidos' => $pedidos]);

        // $pedidos = DB::table('pedidos')->paginate(10);
        // return view('pedidos', ['pedidos' => $pedidos]);
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
            // $photo_path = $request->file('foto')->store('public/images/imagem_pedidos');
            // $photo_path = $request->file('imagem')->store('images/imagem_pedidos', 'public');
            $photo_path = $request->file('foto')->store('public/images/imagem_pedidos');
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
