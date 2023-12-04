@extends('layout.master')

@section('title', 'LeiriBook-Evento')

@section('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css" />
    <link rel="stylesheet" href="{{ asset('css/danielcochico_evento.css') }}">


@endsection

@section('content')


    <!-- ======= Event Section ======= -->

    <div id="caminho">
        <a id="caminho_links" href="">Página Principal</a> >
        <a id="caminho_links" href="">Eventos</a> >
        Semana do Camões
    </div>

    <h1 id="titulo">Semana do Camões</h1>

    <div class="container custom-container">
        <div class="row">
            <div class="col-lg-8 col-sm-12 text-center">
                <section id="slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('images/danielcochico/camoes2.jpg') }}" alt="" />
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('images/danielcochico/camoes3.jpg') }}" alt="" />
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
                            </li>
                        </ul>
                    </div>
                </section>
                <ul id="thumbnails" class="thumbnails">
                    <li class="thumbnail">
                        <img src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
                    </li>
                    <li class="thumbnail">
                        <img src="{{ asset('images/danielcochico/camoes2.jpg') }}" alt="" />
                    </li>
                    <li class="thumbnail">
                        <img src="{{ asset('images/danielcochico/camoes3.jpg') }}" alt="" />
                    </li>
                    <li class="thumbnail">
                        <img src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
                    </li>
                </ul>


            </div>
            <div class="col-lg-4 col-sm-12" id="labels">
                <table class="table table-borderless text-start">
                    <tbody>
                        <tr class="table-active">
                            <td>Localidade</td>
                        </tr>
                        <tr>
                            <td>Leiria, Rua de Leiria, 2400-181</td>
                        </tr>
                        <tr class="table-active">
                            <td>Datas</td>
                        </tr>
                        <tr>
                            <td>Data Inícial - 01/12/2023</td>
                        </tr>
                        <tr>
                            <td>Data Final - 31/12/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2 id="descricao">Descrição</h2>

        <div class="col-md-12">
            <div class="form-group">
                <div id="texto">
                    Nesta semana, o livro principal vai ser "Os Lusíadas" de Luís de Camões,
                    lançado em 1572 e o incentivo vai ser para ler este livro para depois
                    discutirmos de forma ordenada para tirar uma boa conclusão sobre o mesmo
                    e para adquirir uma boa quantidade de conhecimento.
                </div>
            </div>
        </div>
        <a href="#">
            <input id="botao_evento" class="btn btn-dark btn-block fa-lg gradient-custom-2 mb-3" value="Voltar aos Eventos">
        </a>
    </div>

    <hr>
    </section><!-- End Cliens Section -->

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/danielcochico_evento.js') }}"></script>
@endsection

@endsection
