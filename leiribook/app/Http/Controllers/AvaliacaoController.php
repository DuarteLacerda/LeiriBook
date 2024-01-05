<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index()
    {
        //
        $avaliacoes = Avaliacao::all();
        return view('_admin.avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        //
        $avaliacao = new Avaliacao;
        return view('_admin.avaliacoes.create', compact("avaliacao"));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(FaqRequest $request)
    // {
    //     $fields = $request->validated();
    //     //Repare que o conteúdo anterior de validação foi eliminado neste ponto
    //     $faq = new Faq();
    //     $faq->fill($fields);
    //     $faq->save();
    //     return redirect()->route('admin.faqs.index')->with(
    //         'success',
    //         'Pergunta criada com sucesso'
    //     );
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Faq $faq)
    // {
    //     //
    //     return view('_admin.faqs.edit', compact('faq'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(FaqRequest $request, Faq $faq)
    // {
    //     //
    //     $fields = $request->validated();
    //     $faq->fill($fields);
    //     $faq->save();
    //     return redirect()->route('admin.faqs.index')->with('success', 'Pergunta atualizada com sucesso');
    // }





    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return redirect()->route('admin.avaliacoes.index')->with(
            'success',
            'Avaliação eliminada com sucesso'
        );
    }
}
