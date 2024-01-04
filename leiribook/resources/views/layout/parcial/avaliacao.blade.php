{{-- no fim de tudo tirar a rota da pag web.php e tirar o extends('layout.master') e tirar as sections @section('title', 'LeiriBook - Avaliação')
@section('styles') e tirar a section dos scripts, as ligacoes dos links e dos scripts tem que ser feitas na pagina do daniel ribeiro --}}
@extends('layout.master')
@section('title', 'LeiriBook - Avaliação')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vanessa.avaliacao.css') }}">
@endsection
@section('content')
    <div class="container-ratings">
        <div class="panel">
            <div class="ratings-container">
                <h1>Como classificas este livro? </h1>
                <form action="" id="ratingForm">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full"
                            for="star5" title="5 stars"></label>

                        <input type="radio" id="star4" name="rating" value="4" /><label class="full"
                            for="star4" title="4 stars"></label>

                        <input type="radio" id="star3" name="rating" value="3" /><label class="full"
                            for="star3" title="3 stars"></label>

                        <input type="radio" id="star2" name="rating" value="2" /><label class="full"
                            for="star2" title="2 stars"></label>

                        <input type="radio" id="star1" name="rating" value="1" /><label class="full"
                            for="star1" title="1 star"></label>

                    </fieldset>
                    <input disabled type="submit" name="getVal" value="Avaliar">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/vanessa.avaliacao.js') }}"></script>

@endsection
