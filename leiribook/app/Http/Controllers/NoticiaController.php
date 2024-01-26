<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticiaRequest;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $noticias = Noticia::all();
        return view('_admin.noticias.index', compact('noticias'));
    }


    public function create()
    {
        //
        $noticia = new Noticia;
        return view('_admin.noticias.create', compact("noticia"));
    }


    public function store(NoticiaRequest $request)
    {
        $fields = $request->validated();

        if ($request->hasFile('foto')) {
            $photo_path = $request->file('foto')->store('public/noticias');
            $fields['foto'] = basename($photo_path);
        }

        $fields['user_id'] = auth()->user()->id;

        $noticia = Noticia::create($fields);

        return redirect()->route('admin.noticias.index')->with(
            'success',
            'Noticia criada com sucesso'
        );
    }


    public function edit(Noticia $noticia)
    {
        return view('_admin.noticias.edit', compact('noticia'));
    }



    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        $fields = $request->validated();

        if ($request->hasFile('foto')) {
            $photo_path = $request->file('foto')->store('public/noticias');
            $fields['foto'] = basename($photo_path);
        }

        $noticia->fill($fields);
        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia atualizada com sucesso');
    }




    public function destroy(Noticia $noticia)
    {
        //
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with(
            'success',
            'Noticia eliminada com sucesso'
        );
    }
}
