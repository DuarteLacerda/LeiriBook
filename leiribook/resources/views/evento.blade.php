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
                    <a id="caminho_links" href="{{ route('eventos') }}">Eventos</a> >
                    {{ $evento->nome }}
                </div>

                <h1 id="titulo">{{ $evento->nome }}</h1>
            <div class="row">
                <div class="col-lg-8 col-sm-12 text-center">
                    <section id="slider" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @if ($evento->fotos->isNotEmpty())
                                    @foreach ($evento->fotos as $foto)
                                        <li class="splide__slide">
                                            <img src="{{ $foto->foto_url }}" alt="" />
                                        </li>
                                    @endforeach
                                @else
                                    <li class="splide__slide">
                                        <img src="{{ asset('images/danielcochico/logo_default_horizontal.png') }}" alt="" />
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </section>
                    <ul id="thumbnails" class="thumbnails">
                        @if ($evento->fotos->isNotEmpty())
                            @foreach ($evento->fotos as $thumbnail)
                                <li class="thumbnail">
                                    <img src="{{ $thumbnail->foto_url }}" alt="" />
                                </li>
                            @endforeach
                        @else
                            <li class="thumbnail">
                                <img src="{{ asset('images/danielcochico/logo_default.png') }}" alt="" />
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-12" id="labels">

                    <h1 id="detalhes">Detalhes do Evento</h1>

                    <table class="table table-bordered text-start">
                        <tbody>
                            <tr class="table-active">
                                <td>Localidade</td>
                            </tr>
                            <tr>
                                <td>{{ $evento->local }}</td>
                            </tr>
                            <tr class="table-active">
                                <td>Datas</td>
                            </tr>
                            <tr>
                                <td>Data Inícial - {{ date('d-m-y', strtotime($evento->data_inicio)) }}</td>
                            </tr>
                            <tr>
                                <td>Data Final - {{ date('d-m-y', strtotime($evento->data_fim)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 id="descricao">Descrição</h2>

            <div class="col-md-12">
                <div class="form-group">
                    <div id="texto">
                        {{ $evento->descricao }}
                    </div>
                </div>
            </div>
            <div id="botao_evento" class="text-center"><a class="btn btn-dark btn-block gradient-custom-2 mb-3"
                    href="{{ route('eventos') }}">Voltar aos eventos</a></div>
        </div>

        <hr>
        </section><!-- End Cliens Section -->
    </div>

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/danielcochico_evento.js') }}"></script>
@endsection

@endsection
