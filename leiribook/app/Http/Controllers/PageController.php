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
        $livros = Livro::where('created_at', '<', $currentDateTime)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $eventos = Evento::all();
        $eventos = Evento::where('data_fim', '>', $currentDateTime)
            ->orderBy('data_fim', 'desc')
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

    public function pedidos()
    {
        return view("pedidos");
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


    public function eventos($listar=null)
    {

        $currentDateTime = now();

        $eventosRecentes = Evento::where('data_fim', '>', $currentDateTime)
            ->orderBy('data_fim', 'asc')
            ->take(5)
            ->get();

        if ($listar == "passados") {
            $eventos = Evento::where('data_fim', '<', $currentDateTime)
                ->orderBy('data_fim', 'asc')->paginate(6);
        } elseif ($listar == "decorrer") {
            $eventos = Evento::where('data_fim', '>=', $currentDateTime)->where('data_inicio', '<=', $currentDateTime)
            ->orderBy('data_fim', 'asc')->paginate(6);
        } elseif ($listar == "futuros") {

            $eventos = Evento::where('data_inicio', '>', $currentDateTime)
            ->orderBy('data_fim', 'asc')->paginate(6);
        } else {
            $eventos = Evento::orderBy('data_fim', 'asc')->paginate(6);
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
        $users = User::where('role', 'like', 'A')->get();
        return view("sobrenos", compact("users"));
    }
}
