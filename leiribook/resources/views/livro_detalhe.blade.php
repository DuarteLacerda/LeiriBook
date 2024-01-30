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
            <form action="{{ route('livro.update.interesse', ['id' => $livro->id]) }}" method="post">
                @csrf
                <p><strong>Autor:</strong> {{ $livroAutor }}<br>
                </p>
                <p> <strong>Edição:</strong> {{ $livroEdicao }}<br></p>

                <p>
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

                <p>
                    <strong>Estado:</strong>
                </p>

                <select name="estado" id="estado" class="select-css" onchange="this.form.submit()">
                    <option value="-" {{ $interesseEstado === '-' ? 'selected' : '' }}>Não lido</option>
                    <option value="lido" {{ $interesseEstado === 'lido' ? 'selected' : '' }}>Lido</option>
                    <option value="a_ler" {{ $interesseEstado === 'a_ler' ? 'selected' : '' }}>A ler</option>
                    <option value="quero_ler" {{ $interesseEstado === 'quero_ler' ? 'selected' : '' }}>Quero ler</option>
                </select>
                <div class="button-score">
                    <a href="{{ route('avaliacao') }}" class="custom-btn btn-3">
                        <span>Avaliar</span>
                    </a>
                </div>

            </form>



        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/daniel.js') }}"></script>
@endsection
@endsection
