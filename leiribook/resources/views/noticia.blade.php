@extends('layout.master')

@section('title', 'LeiriBook-' . $tituloPagina)

@section('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css" />
    <link rel="stylesheet" href="{{ asset('css/danielcochico_noticia.css') }}">


@endsection

@section('content')



    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>

    <div class="container custom-container">
        <div class="container-noticia">
            <div id="caminho">
                <a id="caminho_links" href="{{ route('home') }}">Página Principal</a> >
                <a id="caminho_links" href="{{ route('noticias') }}">Notícias</a> >
                {{ $noticia->titulo }}
            </div>

            <h1 id="titulo">{{ $noticia->titulo }}</h1>

            <p id="data">Data: {{ date('d-m-y', strtotime($noticia->data)) }}</p>

            <div class="row">
                <div class="col text-center">
                    <img id="img_noticia" src="{{ asset("storage/noticias/{$noticia->foto}") }}" alt="{{ $noticia->titulo }}">
                </div>
            </div>

            <h2 id="descricao">Descrição</h2>

            <div class="col-md-12">
                <div class="form-group">
                    <div id="texto">
                        {{ $noticia->descricao }}
                    </div>
                </div>
            </div>

            <div id="botao_noticia" class="text-center">
                <a id="botao_noticias" class="btn btn-primary btn-block gradient-custom-2 mb-3"
                    href="{{ route('noticias') }}">Voltar às notícias</a>
            </div>
        </div>
        <hr>
        </section><!-- End Cliens Section -->
    </div>

@section('scripts')
    <script src="{{ asset('js/danielcochico_noticia.js') }}"></script>
@endsection

@endsection
