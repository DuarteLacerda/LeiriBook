<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use App\Models\Interesse;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function biblioteca()
    {
        $categorias = Categoria::all();
        $livros = Livro::paginate(9);
        return view('biblioteca', compact('categorias', 'livros'));
    }
    public function filterByGenre(Request $request)
    {
        $categorias = Categoria::all();
        if ($request->has('genre')) {
            $genre = $request->input('genre');
            if ($genre === 'all') {
                return redirect()->route('biblioteca', ['genre' => 'all']);
            } else {
                $livros = Livro::whereHas('categorias', function ($query) use ($genre) {
                    $query->where('nome', $genre);
                })->paginate(9);
            }
        } else {
            $livros = Livro::paginate(9);
            $genre = 'all';
        }

        return view('biblioteca', compact('livros', 'categorias', 'genre'));
    }
    public function livro_detalhe($id)
    {

        $livro = Livro::with('categorias')->find($id);


        if (!$livro) {

            return redirect()->route('biblioteca')->with('error', 'Livro não encontrado');
        }


        $livroTitulo = $livro->titulo;
        $livroDescricao = $livro->descricao;
        $livroAutor = $livro->autor;
        $livroFoto = $livro->foto;
        $livroEdicao = $livro->edicao;


        $categorias = $livro->categorias;


        foreach ($categorias as $categoria) {
            $categoriaNome = $categoria->nome;

        }

    $userId = auth()->id();


    $interesse = Interesse::where('user_id', $userId)
        ->where('livro_id', $id)
        ->first();
        $interesseEstado = $interesse ? $interesse->estado : '-';


        return view('livro_detalhe', compact('livroTitulo', 'livroDescricao', 'livroAutor', 'livroFoto', 'livroEdicao', 'categorias', 'interesseEstado'));


    }
    //back-end
    public function index()
    {
        //
        $livros = Livro::all();
        return view('_admin.livros.index', compact('livros'));
    }

    public function create()
    {
        //
        $livro = new Livro;
        return view('_admin.livros.create', compact("livro"));
    }


    public function store(LivroRequest $request)
    {
        $fields = $request->validated();

        $livro = new Livro();
        $livro->fill($fields);
        if ($request->hasFile('foto')) {
            $photo_path = $request->file('foto')->store('public/books');
            $livro->foto = basename($photo_path);
        }
        $livro->user_id=auth()->user()->id;
        $livro->save();
        return redirect()->route('admin.livros.index')->with(
            'success',
            'Livro criado com sucesso'
        );
    }


    public function edit(Livro $livro)
    {

        return view('_admin.livros.edit', compact('livro'));
    }


    public function update(LivroRequest $request, Livro $livro)
    {
        //
        $fields = $request->validated();
        $livro->fill($fields);
        if ($request->hasFile('foto')) {

            if ($livro->foto == basename($request->file('foto'))) {
                Storage::disk('public')->delete('books/' . $livro->foto);
            }
            $photo_path = $request->file('foto')->store('public/users_photos');
            $livro->foto = basename($photo_path);
        }
        $livro->save();
        return redirect()->route('admin.livros.index')->with('success', 'Livro atualizado com sucesso');
    }


    public function destroy(Livro $livro)
    {

        Storage::disk('public')->delete('books/' . $livro->foto);
        $livro->categorias()->detach();
        $livro->delete();
        return redirect()->route('admin.livros.index')->with(
            'success',
            'Livro eliminado com sucesso'
        );
    }


}
