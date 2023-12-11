<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livro;
use App\Models\Evento;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $currentDateTime = now();

        $livros = Livro::all();
        $livros = Livro::where('created_at', '>', $currentDateTime)
            ->orderBy('created_at', 'asc')
            ->take(3)
            ->get();

        $eventos = Evento::all();
        $eventos = Evento::where('data_fim', '>', $currentDateTime)
            ->orderBy('data_fim', 'asc')
            ->take(3)
            ->get();

        return view("welcome", compact("eventos", "livros"));
    }
    public function contactos()
    {
        return view("contactos");
    }
    public function politica_privacidade()
    {
        return view("politica_privacidade");
    }

    public function termos_e_condicoes()
    {
        return view("termos_e_condicoes");
    }

    public function pedido_livro()
    {
        return view("pedido_livro");
    }

    public function evento($nome)
    {

        $nome = str_replace('-', ' ', $nome);

        $evento = Evento::with(['fotos' => function ($query) {
            $query->orderBy('ordem');
        }])->where('nome', $nome)->firstOrFail();

        $tituloPagina = $evento->nome;


        return view('evento', compact('evento', 'tituloPagina'));
    }


    public function eventos(Evento $evento = null)
    {
        $currentDateTime = now();

        $eventosRecentes = Evento::where('data_fim', '>', $currentDateTime)
            ->orderBy('data_fim', 'asc')
            ->take(5)
            ->get();

        if ($evento) {
            $eventos = Evento::where('category_id', $evento->id)
                ->orderBy('data_fim', 'asc')
                ->get();
        } else {
            $eventos = Evento::orderBy('data_fim', 'asc')->get();
        }

        return view('eventos', compact('eventos', 'eventosRecentes'));
    }

    public function faqs()
    {
        return view("faqs");
    }
    public function admin()
    {
        return view("_admin.dashboard");
    }

    public function sobrenos()
    {
        $users = User::all();
        return view("sobrenos", compact("users"));
    }
}
