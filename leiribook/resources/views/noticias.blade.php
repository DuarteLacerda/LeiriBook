@extends('layout.master')

@section('title', 'LeiriBook-Notícias')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/danielcochico_noticias.css') }}">

@endsection

@section('content')

    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>

    <div class="container-evento hide-content">
        <!-- ======= Event Section ======= -->
        <div class="row">
            <div class="col-lg-8">
                <div id="sliders" class="mb-3">
                    @foreach ($noticiasRecentes->take(1) as $index => $noticia)
                    <div class="mySlides fade">
                        <img class="slider" src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="" />
                        <div class="text">{{ $noticia->titulo }} | {{ date('d-m-y', strtotime($noticia->data)) }}</div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    @foreach ($noticiasRecentes->slice(1, 3) as $noticia)
                        <div class="col-md-12 mb-3">
                            <img src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="" class="img-fluid" />
                            <div class="text">{{ $noticia->titulo }} | {{ date('d-m-y', strtotime($noticia->data)) }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>






    <div id="caminho">
        <a id="caminho_links" href="{{ route('home') }}">Página Principal</a> > Notícias
    </div>

    <div class="px-4 px-lg-5 mt-5">
        <div class="d-flex justify-content-center mt-4">
            {{ $noticias->withQueryString()->links() }}
        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if ($noticias->isNotEmpty())
                @foreach ($noticias as $noticia)
                    <div class="eventos-carta col mb-3  mx-xl-1" data-data="{{ $noticia->data }}">
                        <div id="carta_border" class="card h-100">

                            <img class="card-img-top" id="img_carta_eventos"
                                src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="..." />

                            <div class="card-body p-4">
                                <div class="text-center">

                                    <h5 id="titulo_evento" class="fw-bolder">{{ $noticia->titulo }}</h5>
                                    <label class="datas" id="data-inicio">De:
                                        {{ date('d-m-y', strtotime($noticia->data)) }}</label>
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a id="botao_detalhes" class="btn btn-primary btn-block gradient-custom-2 mb-3"
                                    href="{{ route('noticia', $noticia->id) }}">Ver detalhes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h6>Não existem notícias.</h6>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $noticias->withQueryString()->links() }}
        </div>
    </div>

    <div id="botao_evento" class="text-center"><a id="botao_eventos" class="btn btn-dark btn-block gradient-custom-2 mb-3"
            href="{{ route('home') }}">Voltar à página principal</a>
    </div>
    <hr>
    </section><!-- End Cliens Section -->
    </div>



@section('scripts')

    <script src="{{ asset('js/danielcochico_noticias.js') }}"></script>
@endsection

@endsection
