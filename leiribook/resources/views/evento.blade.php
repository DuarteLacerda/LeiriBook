@extends('layout.master')

@section('title', 'LeiriBook-Evento')

@section('styles')
<script src="{{ asset('css/danielcochico_evento.css') }}"></script>
@endsection

@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="inner-page d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Evento</h1>
          <h2>
            <a href="#">Home</a>
            > <a href="#">Eventos</a> > Evento
          </h2>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection

@section('main')
 <!-- ======= Event Section ======= -->

 <div id="caminho">
    <a id="caminho_links" href="">Página Principal</a> >
    <a id="caminho_links" href="">Eventos</a> >
    Semana do Camões
  </div>

 <h1 id="titulo">Semana do Camões</h1>

 <div class="container custom-container">
    <div class="row">
      <div class="col-lg-9 col-sm-12 text-center">



        <section id="slider" class="splide" >
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <img src="img/danielcochico/camoes.jpg" alt="" />
              </li>
              <li class="splide__slide">
                <img src="img/danielcochico/camoes2.jpg" alt="" />
              </li>
              <li class="splide__slide">
                <img src="img/danielcochico/camoes3.jpg" alt="" />
              </li>
              <li class="splide__slide">
                <img src="img/danielcochico/camoes.jpg" alt="" />
              </li>
            </ul>
          </div>
        </section>

        <ul id="thumbnails" class="thumbnails">
          <li class="thumbnail">
            <img src="img/danielcochico/camoes.jpg" alt="" />
          </li>
          <li class="thumbnail">
            <img src="img/danielcochico/camoes2.jpg" alt="" />
          </li>
          <li class="thumbnail">
            <img src="img/danielcochico/camoes3.jpg" alt="" />
          </li>
          <li class="thumbnail">
            <img src="img/danielcochico/camoes.jpg" alt="" />
          </li>
        </ul>


      </div>
      <div class="col-lg-3 col-sm-12" id="labels">
        <table class="table table-borderless text-start">
          <tbody>
            <tr class="table-active">
              <td>Localidade</td>
            </tr>
            <tr>
              <td>Leiria, Rua de Leiria, 2400-181</td>
            </tr>
            <tr class="table-active">
              <td>Horário</td>
            </tr>
            <tr>
              <td>01/12/2023 - 31/12/2023</td>
            </tr>
            <tr>
              <td>10:00 - 16:30</td>
            </tr>
            <tr class="table-active">
              <td>Contactos</td>
            </tr>
            <tr>
              <td>+(351) 912 732 123</td>
            </tr>
            <tr class="text-center">
              <td>
                <img id="img_redesocial" src="img/danielcochico/facebook.png" alt="">
                <img id="img_redesocial" src="img/danielcochico/instagram.png" alt="">
                <img id="img_redesocial" src="img/danielcochico/twitter.png" alt="">
              </td>
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
          e para adquirir uma boa quantidade de conhecimento
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
   <script src="{{ asset('js/danielcochico_evento.js') }}"></script>
   @endsection

@endsection
