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
        $users = User::all();
        $livros = Livro::all();
        $eventos = Evento::all();
        return view("welcome");
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

    public function evento()
    {
        $evento=Evento::all();
        return view("evento",compact("evento"));
    }

    public function eventos(Evento $evento = null)
    {
        if ($evento)
            $eventos = Evento::where('category_id', $evento->id)->get();
        else
            $eventos = Evento::all();
        return view('eventos', compact('eventos'));
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
