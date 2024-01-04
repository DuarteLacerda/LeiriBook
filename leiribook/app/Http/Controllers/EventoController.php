<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        return view('_admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $evento = new Evento;
        return view('_admin.eventos.create', compact("evento"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request)
    {
        $fields = $request->validated();
        //Repare que o conteúdo anterior de validação foi eliminado neste ponto
        $evento = new Evento();
        $evento->fill($fields);     
        $evento->user_id=auth()->user()->id;
        $evento->save();
        return redirect()->route('admin.eventos.index')->with(
            'success',
            'Evento criado com sucesso'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
        return view('_admin.eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        //
        $fields = $request->validated();
        $evento->fill($fields);
        $evento->save();
        return redirect()->route('admin.eventos.index')->with('success', 'Evento atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with(
            'success',
            'Evento eliminado com sucesso'
        );
    }
}
