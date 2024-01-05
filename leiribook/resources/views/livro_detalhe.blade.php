@extends('layout.master')
@section('title', 'LeiriBook - Livro')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')
    <!--xd-->
    <h1> </h1>
    <div id="bookcontainer">
        <div id="bookimage">

        </div>
        <div id="bookinfo">
            <!-- livro_detalhe.blade.php -->

            <h1>{{ $livroTitulo }}</h1>
            <p>{{ $livroDescricao }}</p>
            <!-- ... other livro attributes ... -->

            <ul>
                @if (!empty($categorias))
                    @foreach ($categorias as $categoria)
                        <li>{{ $categoria }}</li>
                    @endforeach
                @else
                    <li>No categories available</li>
                @endif
            </ul>



        </div>
    </div>
@endsection
