@extends('layout.master')
@section('title', 'LeiriBook - Lista')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection
@section('content')
    <div id="large-th">
        <div class="container1">
            <h1>A sua lista de livros</h1>
            <br>
            <!-- Filters -->
            <form action="{{ route('filter.interesses') }}" method="GET">
                <label for="estado">Filtrar por interesse</label>
                <div class="filter-container1">
                    <select name="estado" id="estado" class="select-css">
                        <option value="all" {{ $selectedEstado === 'all' ? 'selected' : '' }}>Todos</option>
                        <option value="lido" {{ $selectedEstado === 'lido' ? 'selected' : '' }}>Lido</option>
                        <option value="a_ler" {{ $selectedEstado === 'a_ler' ? 'selected' : '' }}>A ler</option>
                        <option value="quero_ler" {{ $selectedEstado === 'quero_ler' ? 'selected' : '' }}>Quero ler</option>
                    </select>
                    <button class="custom-btn btn-3" type="submit"><span>Filtrar</span></button>
                </div>
            </form>
            <!-- End Filters -->
            <div id="list-th">
                @forelse ($livrosUser as $interesse)
                    <a href="{{ route('livro_detalhe', ['id' => $interesse->livro->id]) }}">
                        <div class="book">
                            <div class="cover">
                                <img src="{{ asset('storage/books/' . $interesse->livro->foto) }}" alt="imagem">
                            </div>
                            <div class="description">
                                <p class="title">{{ $interesse->livro->titulo }}<br>
                                    <span class="author">{{ $interesse->livro->autor }}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Não há livros</p>
                @endforelse
                {{ $livrosUser->links() }}
            </div>
        </div>
    </div>
@endsection
