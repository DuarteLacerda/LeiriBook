@extends('layout.master')
@section('title', 'LeiriBook - Livro')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')
    <!--xd-->
    <h1 id="booktitle">{{ $livroTitulo }} </h1>
    <div id="bookcontainer">
        <div id="bookimage">
            <img src="{{ asset('storage/books/' . $livroFoto) }}" alt="Imagem do Livro">
        </div>
        <div id="bookinfo">
            <p><strong>Autor:</strong> {{ $livroAutor }}<br>
                <strong>Edição:</strong> {{ $livroEdicao }}<br>


                <strong>Categorias:</strong>
                @if (count($categorias) > 1)
                    @foreach ($categorias as $categoria)
                        {{ $categoria->nome }},
            </p>
            @endforeach
        @else
            @foreach ($categorias as $categoria)
                {{ $categoria->nome }}
            @endforeach
            @endif
            <br><select name="estado" id="estado" class="select-css">
                <option value="-">Não lido</option> <!-- Default option -->
                <option value="lido">Lido</option> <!-- Default option -->
                <option value="a_ler">A ler</option> <!-- Default option -->
                <option value="quero_ler">Quero ler</option> <!-- Default option -->
            </select>
</p>


        </div>
    </div>
@endsection
