<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\EventoFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventoFotoRequest;

class EventoPhotoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Evento $evento)
    {
        //
        $fotos = $evento->fotos()->orderBy('ordem')->get();
        return view('_admin.eventos_fotos.index', compact('fotos','evento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Evento $evento)
    {
        //
        $foto = new EventoFoto();
        return view('_admin.eventos_fotos.create', compact("evento",'foto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoFotoRequest $request, Evento $evento)
    {
        $fields = $request->validated();
        //Repare que o conteúdo anterior de validação foi eliminado neste ponto
        $foto = new EventoFoto();
        $foto->fill($fields);

        //save
        if ($request->hasFile('foto')) {
             $photo_path = $request->file('foto')->store('public/eventos_fotos');
             $foto->foto = basename($photo_path);
         }
        $foto->evento_id=$evento->id;
        $foto->save();
        return redirect()->route('admin.evento_fotos.index',$evento)->with(
            'success',
            'Foto criada com sucesso'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento,EventoFoto $foto)
    {
        //
        return view('_admin.eventos_fotos.edit', compact('evento','foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoFotoRequest $request, Evento $evento, EventoFoto $foto)
    {
        //
        $fields = $request->validated();
        $foto->fill($fields);

        //guardar a foto
        if ($request->hasFile('foto')) {
           Storage::disk('public')->delete('eventos_fotos/' . $foto->foto);
            $photo_path = $request->file('foto')->store('public/eventos_fotos');
            $foto->foto = basename($photo_path);
        }
        $foto->save();
        return redirect()->route('admin.evento_fotos.index',$evento)->with('success', 'Foto atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento, EventoFoto $foto)
    {
        //apagar a foto
        Storage::disk('public')->delete('eventos_fotos/' . $foto->foto);
        $foto->delete();
        return redirect()->route('admin.evento_fotos.index',$evento)->with(
            'success',
            'Foto eliminada com sucesso'
        );
    }
}
