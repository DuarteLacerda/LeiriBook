@extends('layout.master')

@section('title', 'LeiriBook-Eventos')

@section('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css" />
    <link rel="stylesheet" href="{{ asset('css/danielcochico_eventos.css') }}">


@endsection

@section('content')


    <!-- ======= Event Section ======= -->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img id="slider" src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
            <div class="text">Semana do Camões</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img id="slider" src="{{ asset('images/danielcochico/camoes2.jpg') }}" alt="" />
            <div class="text">Semana do Camões 2</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img id="slider" src="{{ asset('images/danielcochico/camoes3.jpg') }}" alt="" />
            <div class="text">Semana do Camões 3</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img id="slider" src="{{ asset('images/danielcochico/camoes.jpg') }}" alt="" />
            <div class="text">Semana do Camões 4</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div class="mySlides fade">
            <div class="prev" onclick="plusSlides(-1)" onmouseover="resetTimer()">❮</div>
            <img id="slider" src="{{ asset('images/danielcochico/camoes.jpg2') }}" alt="" />
            <div class="text">Semana do Camões 5</div>
            <div class="next" onclick="plusSlides(1)" onmouseover="resetTimer()">❯</div>
        </div>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>


    <div id="caminho">
        <a id="caminho_links" href="">Página Principal</a> > Eventos
    </div>


        <a href="#">
            <input id="botao_evento" class="btn btn-dark btn-block fa-lg gradient-custom-2 mb-3" value="Voltar à página principal">
        </a>
    </div>

    <hr>
    </section><!-- End Cliens Section -->

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/danielcochico_eventos.js') }}"></script>
@endsection

@endsection
