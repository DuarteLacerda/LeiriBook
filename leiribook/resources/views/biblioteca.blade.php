@extends('layout.master')
@section('title', 'LeiriBook - Biblioteca')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')
    <div id="large-th">
        <div class="container1">
            <h1>Biblioteca</h1>
            <br>
            <!-- Filters -->
            <form action="{{ route('filter.books') }}" method="GET">
                <label for="genre">Filtrar por género</label>
                <div class="filter-container1">
                <select name="genre" id="genre" class="select-css">
                    <option value="all">-</option> <!-- Default option -->
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->nome }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                <button class="custom-btn btn-3" type="submit"><span>Filtrar</span></button>
                </div>
            </form>
            <!-- End Filters -->
            <div id="list-th">
                @forelse ($livros as $livro)
                    <div class="book">
                        <div class="cover">
                            <img src="{{ asset('storage/books/' . $livro->foto) }}" alt="imagem">
                        </div>
                        <div class="description">
                            <p class="title">{{ $livro->titulo }}<br>
                                <span class="author">{{ $livro->autor }}</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <p>Não há livros</p>
                @endforelse

                <!--<div class="book">
                                <div class="cover">
                                    <img src="https://alysbcohen.files.wordpress.com/2015/01/little-princess-book-cover.jpg">
                                </div>
                                <div class="description">
                                    <p class="title">A Little Princess<br>
                                        <span class="author">Frances Hodgson Burnett</span>
                                    </p>
                                </div>
                            </div>-->
            </div>
        </div>
    </div>
@endsection
