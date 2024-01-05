@extends('layout.master')
@section('title', 'LeiriBook - Livro')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')
    <!--xd-->
    <h1>{{ $livroTitulo }} </h1>
    <div id="bookcontainer">
        <div id="bookimage">
            <img src="{{ asset('storage/books/' . $livroFoto) }}" alt="Imagem do Livro">
        </div>
        <div id="bookinfo">
            <p>{{ $livroDescricao }}</p>
            <p><strong>Autor:</strong> {{ $livroAutor }}</p>
            <p><strong>Edição:</strong> {{ $livroEdicao }}</p>


            <h3>Categorias:</h3>
            @if (count($categorias) > 0)
                <ul>
                    @foreach ($categorias as $categoria)
                        <li>{{ $categoria->nome }}</li>
                    @endforeach
                </ul>
            @else
                <p>Este livro não tem categorias associadas.</p>
            @endif




        </div>
    </div>
@endsection
