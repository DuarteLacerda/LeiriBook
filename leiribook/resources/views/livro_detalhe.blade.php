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
                    @endforeach
            </p>
        @else
            @foreach ($categorias as $categoria)
                {{ $categoria->nome }}
            @endforeach
            @endif
            <br>

            <form action="{{ route('livro.update.interesse', ['id' => $livro->id]) }}" method="post">
                @csrf
                <select name="estado" id="estado" class="select-css" onchange="this.form.submit()">
                    <option value="-" {{ $interesseEstado === '-' ? 'selected' : '' }}>Não lido</option>
                    <option value="lido" {{ $interesseEstado === 'lido' ? 'selected' : '' }}>Lido</option>
                    <option value="a_ler" {{ $interesseEstado === 'a_ler' ? 'selected' : '' }}>A ler</option>
                    <option value="quero_ler" {{ $interesseEstado === 'quero_ler' ? 'selected' : '' }}>Quero ler</option>
                </select>
            </form>


        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/daniel.js') }}"></script>
@endsection
@endsection
