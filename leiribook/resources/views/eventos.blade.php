@extends('layout.master')

@section('title', 'LeiriBook-Eventos')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/danielcochico_eventos.css') }}">


@endsection

@section('content')


    <!-- ======= Event Section ======= -->
    <div id="sliders">
        <div class="mySlides fade">
            <a href="#">
                <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
                <img class="slider" src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
                <div class="text">Semana do Camões 1 | 01/12 - 31/01</div>
                <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
            </a>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img class="slider" src="{{ asset('images/danielcochico/camoes2.jpg') }}" alt="" />
            <div class="text">Semana do Camões 2 | 27/12 - 23/01</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img class="slider" src="{{ asset('images/danielcochico/camoes3.jpg') }}" alt="" />
            <div class="text">Semana do Camões 3 | 27/12 - 23/01</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img class="slider" src="{{ asset('images/danielcochico/camoes4.jpg') }}" alt="" />
            <div class="text">Semana do Camões 4 | 27/12 - 23/01</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img class="slider" src="{{ asset('images/danielcochico/camoes2.jpg') }}" alt="" />
            <div class="text">Semana do Camões 5 | 27/12 - 23/01</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>
    </div>

    <div class="dots" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>


    <div id="caminho">
        <a id="caminho_links" href="{{ route('home') }}">Página Principal</a> > Eventos
    </div>

    <div class="px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


            @foreach ($eventos as $evento)
                <div id="eventos_carta" class="col mb-3  mx-xl-1">
                    <div id="carta_border" class="card h-100">

                        <img class="card-img-top" id="img_carta_eventos"
                            src="{{ asset('storage/eventos_fotos/' . $evento->fotos->where('ordem', 1)->first()->foto) }}"
                            alt="..." />

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h5 class="fw-bolder">{{ $evento->nome }}</h5>
                                {{ date('d-m-y', strtotime($evento->data_inicio)) }} /
                                {{ date('d-m-y', strtotime($evento->data_fim)) }}
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-dark btn-block gradient-custom-2 mb-3"
                                    href="{{ route('evento', $evento) }}">Ver detalhes</a></div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div id="botao_evento" class="text-center"><a class="btn btn-dark btn-block gradient-custom-2 mb-3"
            href="{{ route('home') }}">Voltar à página principal</a></div>
    </div>

    <hr>
    </section><!-- End Cliens Section -->

@section('scripts')

    <script src="{{ asset('js/danielcochico_eventos.js') }}"></script>
@endsection

@endsection
