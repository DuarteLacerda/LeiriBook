<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Livro;
use App\Models\Evento;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AvaliacaoRequest;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        $currentDateTime = now();

        $livros = Livro::all()->take(3);
        $eventos = Evento::where('data_fim', '<=', $currentDateTime)
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


    public function eventos($listar = null)
    {

        $currentDateTime = now();

        $eventosRecentes = Evento::where('data_fim', '>', $currentDateTime)
            ->orderBy('data_fim', 'asc')
            ->take(5)
            ->get();

        if ($eventosRecentes->count() < 5) {
            $eventosPassados = 5 - $eventosRecentes->count();

            $eventosRecentes = $eventosRecentes->merge(
                Evento::where('data_fim', '<=', $currentDateTime)
                    ->orderBy('data_fim', 'desc')
                    ->take($eventosPassados)
                    ->get()
            );
        }

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
        $faqs = Faq::where('approved', '=', 1)->get();
        return view('faqs', compact('faqs'));
    }

    public function sobrenos()
    {
        $users = User::all();
        $users = User::where('role', 'like', 'A')->get();
        return view("sobrenos", compact("users"));
    }

    public function admin()
    {
        $count_users = User::count();
        $count_livros = Livro::count();
        $count_faqs = Faq::count();
        $count_eventos = Evento::count();
        $count_avaliacoes = Avaliacao::count();
        $count_users_per_role = User::select('role', DB::raw('count(*) as count'))->groupBy('role')->get();
        return view('_admin.dashboard', compact(
            'count_livros',
            'count_users',
            'count_faqs',
            'count_eventos',
            'count_users_per_role',
            'count_avaliacoes'
        ));
    }

    public function profile(User $user)
    {
        //
        return view('_admin.profile', compact('user'));
    }

    public function destroy_photo_profile(User $user)
    {
        if (!empty($user->foto)) {
            Storage::disk('public')->delete('users_photos/' . $user->foto);
        }
        $user->foto = null;
        $user->save();
        return redirect()->route('profile', $user)->with(
            'success',
            'Foto Eliminada com sucesso'
        );
    }

    public function avaliacao()
    {
        $avaliacao = new Avaliacao;
        $livros = Livro::all();
        $user = Auth::user();
        return view('layout.parcial.avaliacao', compact('avaliacao', 'livros', 'user'));
    }

    public function avaliacao_criar(AvaliacaoRequest $request)
    {
        $fields = $request->validated();
        $avaliacao = new Avaliacao();
        $avaliacao->fill($fields);
        $avaliacao->nivel = $fields['rating'];
        $avaliacao->user_id = auth()->user()->id;

        $avaliacao->save();
        return redirect()->route('avaliacao')->with(
            'success',
            $avaliacao->nivel
        );
    }
}
