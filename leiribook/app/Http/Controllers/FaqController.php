<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = Faq::all();
        return view('_admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faq = new Faq;
        return view('_admin.faqs.create', compact("faq"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $fields = $request->validated();
        //Repare que o conteúdo anterior de validação foi eliminado neste ponto
        $faq = new Faq();
        $faq->fill($fields);
        $faq->save();
        return redirect()->route('admin.faqs.index')->with(
            'success',
            'Faq creada com sucesso'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
        return view('_admin.faqs.show', compact("faq"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
        return view('_admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        //
        $fields = $request->validated();
        $faq->fill($fields);
        $faq->save();
        return redirect()->route('admin.faqs.index')->with('success', 'Faq atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
        if ($faq->projects()->exists()) {
            return redirect()->route('admin.faqs.index')->withErrors(
                ['delete' => 'A Faq que tentou eliminar tem projetos
           associados']
            );
        }
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with(
            'success',
            'Faq eliminada com sucesso'
        );
    }
}
