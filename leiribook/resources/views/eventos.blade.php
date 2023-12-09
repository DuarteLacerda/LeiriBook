@extends('layout.master')

@section('title', 'LeiriBook-Eventos')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/danielcochico_eventos.css') }}">


@endsection

@section('content')


    <!-- ======= Event Section ======= -->
    <div id="sliders" onmouseover="onMouseOver(this)" onmouseout="onMouseOut(this)">
        @foreach ($eventos->take(5) as $evento)
            <div class="mySlides fade">
                <div class="prev" onclick="plusSlides(-1)">❮</div>

                @if ($evento->fotos->isNotEmpty())
                    <img class="slider" src="{{ asset('storage/eventos_fotos/' . $evento->fotos->first()->foto) }}" alt="" />
                @else
                    <img class="slider" src="{{ asset('storage/eventos_fotos/logo.png') }}" alt="" />
                @endif

                <div class="text">{{ $evento->nome }} | {{ $evento->data_inicio }} - {{ $evento->data_fim }}</div>
                <div class="next" onclick="plusSlides(1)">❯</div>
            </div>
        @endforeach
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

                        @if ($evento->fotos->isNotEmpty())
                            <img class="card-img-top" id="img_carta_eventos"
                                src="{{ asset('storage/eventos_fotos/' . $evento->fotos->where('ordem', 1)->first()->foto) }}"
                                alt="..." />
                        @else
                            <img class="card-img-top" id="img_carta_eventos" src="{{ asset('images/danielcochico/logo.png') }}" alt="" />
                        @endif

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h5 class="fw-bolder">{{ $evento->nome }}</h5>
                                {{ date('d-m-y', strtotime($evento->data_inicio)) }} /
                                {{ date('d-m-y', strtotime($evento->data_fim)) }}
                            </div>
                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-dark btn-block gradient-custom-2 mb-3"
                                    href="{{ route('evento', $evento) }}">Ver detalhes</a>
                            </div>
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
