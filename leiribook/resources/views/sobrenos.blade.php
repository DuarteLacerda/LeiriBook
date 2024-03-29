@extends('layout.master')
@section('title', 'LeiriBook - Sobre Nós')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vanessa.sobrenos.css') }}">
@endsection
@section('content')
    <button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>
    <div class="container pt-5 pb-5" style="margin-top: 5rem;">
        <h3 class="text-center pb-4" id="leiriBookHistoria">A nossa História</h3>
        <div class="row" id="leiriBookDescricao">
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
                <img src="{{ asset('images/vanessa/livraria.jpg') }}" alt="Descrição da Imagem" class="img-fluid shadow">
            </div>
        </div>
        <h3 class="text-center pb-4 pt-5" id="leiriBookTitulo">A Nossa Missão</h3>
        <div class="row" id="leiriBookRow">
            <div class="col-md-6">
                <img src="{{ asset('images/vanessa/missao.jpg') }}" alt="Descrição da Imagem" class="img-fluid shadow">
            </div>
            <div class="col-md-6">
                <p>Na associação LeiriBook, nossa missão é inspirar, educar e conectar os nossos membros através da
                    leitura. Acreditamos no poder das palavras e na capacidade dos livros de ampliar horizontes,
                    proporcionando assim, a empatia e a construção de diversas perspectivas distintas que se poderão
                    unir.<br>Trabalhamos incansávelmente para criar programas e eventos que incentivem a leitura em
                    todas as idades, promovendo a literacia e o amor pela aprendizagem ao longo da vida.</p>
            </div>
        </div>

        <div class="row avali" id="leiriBookAvalia">
            <div class="col-sm-8 text-center">
                <h3 class="pb-3 pt-5">Fornece a tua experiência acerca do teu livro favorito aqui</h3>
            </div>
            <div class="col-sm-4 pb-5 pt-5 align-items-center justify-content-center text-center d-flex">
                <a href="{{route("avaliacao")}}" class="btn avaliacao btn-lg" role="button">Avaliar</a>
            </div>
        </div>





        <h3 class="text-center p-5" id="leiriBookEquipa">Equipa da LeiriBook</h3>
        <div class="qualquer" id="leiriBookEq">
            <div class="row justify-content-center">
                @if ($users)
                    @foreach ($users as $user)
                        <!-- Card 1 -->
                        <div class="col-md-4 mb-4" id="cartao">
                            <div class="card">
                                @if ($user->foto != null)
                                    <img src="{{ asset('storage/users_photos/' . $user->foto) }}" class="p-4">
                                @else
                                    <img src="{{ asset('images/admin/default-user.png') }}" alt="" class="p-4" />
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        {{ $user->role == 'A' ? 'Administrador' : 'Normal' }}</h5>
                                    <p class="card-text text-center">{{ $user->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 m-2 mb-2 text-center" id="cartao">
                        <h4>Não existem utilizadores registados na base de dados.</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/vanessa.sobrenos.js') }}"></script>
@endsection
@endsection
