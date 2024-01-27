@extends('layout.master')

@section('title', 'LeiriBook-' . $tituloPagina)

@section('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css" />
    <link rel="stylesheet" href="{{ asset('css/danielcochico_evento.css') }}">


@endsection

@section('content')


    <!-- ======= Event Section ======= -->

    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>

        <div class="container custom-container">

            <div class="container-evento">
                <div id="caminho">
                    <a id="caminho_links" href="{{ route('home') }}">Página Principal</a> >
                    <a id="caminho_links" href="{{ route('noticias') }}">Notícias</a> >
                    {{ $noticia->titulo }}
                </div>

                <h1 id="titulo">{{ $noticia->titulo }}</h1>
            <div class="row">
                <div class="col-lg-7 col-sm-12 text-center">
                    <img src="{{ asset("storage/noticias/{$noticia->foto}") }}" alt="{{ $noticia->titulo }}">
                </div>
                <div class="col-lg-5 col-sm-12" id="labels">

                    <h1 id="detalhes">Detalhes da Notícia</h1>
                    <tr>
                        <td id="data_fim">Data Final - {{ date('d-m-y', strtotime($noticia->data)) }}</td>
                    </tr>
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
            <div id="botao_evento" class="text-center"><a id="botao_eventos" class="btn btn-primary btn-block gradient-custom-2 mb-3"
                    href="{{ route('noticias') }}">Voltar às notícias</a></div>
        </div>

        <hr>
        </section><!-- End Cliens Section -->
    </div>

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/danielcochico_noticia.js') }}"></script>
@endsection

@endsection
