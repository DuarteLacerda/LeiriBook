@extends('layout.master')

@section('title', 'LeiriBook-Notícias')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/danielcochico_noticias.css') }}">

@endsection

@section('content')

    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>

    <h1 id="noticias_recentes">Notícias Recentes</h1>

    <div class="container-fluid hide-content">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div id="sliders" class="mb-3">
                    @foreach ($noticiasRecentes->take(1) as $index => $noticia)
                        <a href="{{ route('noticia', ['id' => $noticia->id]) }}" class="mySlides fade position-relative">
                            <div class="card position-relative">
                                <img class="card" src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="Featured News Image">
                                <div class="dark-overlay"></div>
                                <div class="card-body text-white position-absolute bottom-0 start-0">
                                    <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                    <p class="card-text">{{ date('d-m-y', strtotime($noticia->data)) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                @foreach ($noticiasRecentes->slice(1, 3) as $noticia)
                <a id="noticias_underline" href="{{ route('noticia', ['id' => $noticia->id]) }}" class="row mb-3">
                    <div class="col-12">
                        <div class="card h-100 custom-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="Small News Image" class="img-fluid">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="card-title">{{ $noticia->titulo }}</h6>
                                        <p class="card-text">{{ date('d-m-y', strtotime($noticia->data)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

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
        <div class="row row-cols-1 row-cols-md-1 row-cols-xl-3 justify-content-center">
            @if ($noticias->isNotEmpty())
                @foreach ($noticias as $noticia)
                    <div class="noticias-carta col mb-3 mx-xl-1" data-data="{{ $noticia->data }}">
                        <div id="carta_border" class="card h-100">
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <img class="card-img-top" id="img_carta_noticias"
                                        src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="..." />
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 id="titulo_noticia" class="fw-bolder">{{ $noticia->titulo }}</h5>
                                            <label class="datas" id="data-inicio">De:
                                                {{ date('d-m-y', strtotime($noticia->data)) }}</label>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a id="botao_detalhes" class="btn btn-primary gradient-custom-2"
                                                href="{{ route('noticia', $noticia->id) }}">Ver detalhes</a>
                                        </div>
                                    </div>
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



    <div id="botao_noticia" class="text-center"><a id="botao_noticias" class="btn btn-dark btn-block gradient-custom-2 mb-3"
            href="{{ route('home') }}">Voltar à página principal</a>
    </div>
    <hr>
    </section><!-- End Cliens Section -->
    </div>



@section('scripts')

    <script src="{{ asset('js/danielcochico_noticias.js') }}"></script>
@endsection

@endsection
