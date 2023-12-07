@extends('layout.master')
@section('title', 'LeiriBook - Sobre Nós')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vanessa.sobrenos.css') }}">
@endsection
@section('content')
    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>
    <div class="container pt-5 pb-5">
        <h3 class="text-left pb-4">A nossa História</h3>
        <div class="row">
            <div class="col-md-6 ">

                <p>Bem-vindo(a) à LeiriBook, uma associação dedicada ao incentivo da leitura em Leiria.
                    Tudo começou em 2018, quando um grupo de apaixonados por livros uniu forças e decidiram criar a
                    LeiriBook. Movidos pela ideia do poder que a leitura transforma, começámos como um pequeno projeto
                    coletivo com o objetivo de unir as pessoas que se interessam pela leitura na cidade de Leiria.
                    <br>Junta-te a nós na LeiriBook enquanto continuamos esta jornada literária, a enriquecer o nosso
                    conhecimento pela literatura e a ouvir outras opiniões dos nossos membros.
                </p>
            </div>

            <div class="col-md-6">
                <img src="{{ asset('images/vanessa/livraria.jpg') }}" alt="Descrição da Imagem" class="img-fluid">
            </div>

        </div>
        <h3 class="text-center p-5">A Nossa Missão</h3>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/vanessa/missao.jpg') }}" alt="Descrição da Imagem" class="img-fluid">
            </div>
            <div class="col-md-6">

                <p>Na associação LeiriBook, nossa missão é inspirar, educar e conectar os nossos membros através da
                    leitura. Acreditamos no poder das palavras e na capacidade dos livros de ampliar horizontes,
                    proporcionando assim, a empatia e a construção de diversas perspectivas distintas que se poderão
                    unir.<br>Trabalhamos incansávelmente para criar programas e eventos que incentivem a leitura em
                    todas as idades, promovendo a literacia e o amor pela aprendizagem ao longo da vida.</p>
            </div>
        </div>

        <h3 class="text-center p-5">Equipa da LeiriBook</h3>

        <div class="container">
            <div class="row justify-content-center">

                <!-- Card 1 -->
                <div class="col-md-3 m-2 mb-2" id="cartao">
                    <div class="card">
                        <img src="{{ asset('images/vanessa/utilizador.png') }}" class="card-img-top p-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">Título do Card 1</h5>
                            <p class="card-text text-center">Nome Pessoa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-3 m-2 mb-2" id="cartao">
                    <div class="card">
                        <img src="{{ asset('images/vanessa/utilizador.png') }}" class="card-img-top p-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">Título do Card 2</h5>
                            <p class="card-text text-center">Nome Pessoa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-3 m-2 mb-2" id="cartao">
                    <div class="card">
                        <img src="{{ asset('images/vanessa/utilizador.png') }}" class="card-img-top p-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">Título do Card 3</h5>
                            <p class="card-text text-center">Nome Pessoa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-3 m-2 mb-2" id="cartao">
                    <div class="card">
                        <img src="{{ asset('images/vanessa/utilizador.png') }}" class="card-img-top p-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">Título do Card 4</h5>
                            <p class="card-text text-center">Nome Pessoa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-3 m-2 mb-2" id="cartao">
                    <div class="card">
                        <img src="{{ asset('images/vanessa/utilizador.png') }}" class="card-img-top p-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">Título do Card 5</h5>
                            <p class="card-text text-center">Nome Pessoa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/vanessa.sobrenos.js') }}"></script>
@endsection
@endsection
