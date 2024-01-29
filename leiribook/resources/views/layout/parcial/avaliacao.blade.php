{{-- no fim de tudo tirar a rota da pag web.php e tirar o extends('layout.master') e tirar as sections @section('title', 'LeiriBook - Avaliação')
@section('styles') e tirar a section dos scripts, as ligacoes dos links e dos scripts tem que ser feitas na pagina do
daniel ribeiro --}}
@extends('layout.master')
@section('title', 'LeiriBook - Avaliação')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vanessa.avaliacao.css') }}">
@endsection
@section('content')
    <div class="container-ratings">
        <div class="panel">
            @if (!empty(session('success')))
                <span class="fa-heart"></span>
                <h1>Obrigada!</h1>
                <br>
                <strong>Nível da avaliação dada: {{ session('success') }} </strong>
                <p>Ao forneceres o teu feedback estás a ajudar outros utilizadores!</p>
                <br>
            @else
                <form action="{{ route('avaliacao.criar') }}" method="post" id="ratingForm">
                    @csrf
                    <div class="escolherlivro">
                        {{-- <label for="livro" class="control-label mb-1">Livro</label> --}}
                        <div class="input-group">
                            <select name="livro_id" id="livro" class="form-control">
                                <option value="">
                                    Selecione o Livro</option>
                                {{-- quando este clica em selecionar o livro ira buscar atraves do livro id todos os livros que existem na base de dados com os nomes  --}}
                                @foreach ($livros as $livro)
                                    <option value="{{ $livro->id }}"
                                        {{ old('livro_id', $avaliacao->livro_id) == $livro->id ? 'selected' : '' }}>
                                        {{ $livro->titulo }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    @error('livro_id')
                        <div class="text-danger d-block">{{ $message }}</div>
                    @enderror
                    <h1>Como classificas o livro?</h1>
                    <div class="ratings-container">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5"
                                {{ old('rating', $avaliacao->nivel) == '5' ? 'checked' : '' }} /><label class="full"
                                for="star5" title="5 stars"></label>

                            <input type="radio" id="star4" name="rating" value="4"
                                {{ old('rating', $avaliacao->nivel) == '4' ? 'checked' : '' }} /><label class="full"
                                for="star4" title="4 stars"></label>

                            <input type="radio" id="star3" name="rating" value="3"
                                {{ old('rating', $avaliacao->nivel) == '3' ? 'checked' : '' }} /><label class="full"
                                for="star3" title="3 stars"></label>

                            <input type="radio" id="star2" name="rating" value="2"
                                {{ old('rating', $avaliacao->nivel) == '2' ? 'checked' : '' }} /><label class="full"
                                for="star2" title="2 stars"></label>

                            <input type="radio" id="star1" name="rating" value="1"
                                {{ old('rating', $avaliacao->nivel) == '1' ? 'checked' : '' }} /><label class="full"
                                for="star1" title="1 star"></label>
                        </fieldset>
                        @error('rating')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="desc">
                        <h1> Dá o teu feedback: </h1>
                        <textarea id="descricao" name="descricao" rows="4" cols="50"
                            placeholder="Escreve mais sobre a tua avaliação aqui...">{{ old('descricao', $avaliacao->descricao) }}</textarea>
                        @error('descricao')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input disabled type="submit" name="getVal" value="Avaliar">
                </form>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/vanessa.avaliacao.js') }}"></script>
@endsection
