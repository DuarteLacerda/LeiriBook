@extends('layout.admin')
@section('title', 'LeiriBook - Dashboard')
@section('breadcrumb')
<div class="au-breadcrumb-left">
    <span class="au-breadcrumb-span">Tu estás aqui:</span>
    <ul class="list-unstyled list-inline au-breadcrumb__list">
        <li class="list-inline-item">
            <p>Home</p>
        </li>
        <li class="list-inline-item seprate">
            <span>/</span>
        </li>
        <li class="list-inline-item active">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<section>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1>Dashboard</h1>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_users }} </h1>
                            <h3 style="display:inline;"> Utilizadores </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_livros }} </h1>
                            <h3 style="display:inline;"> Livros </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_eventos }} </h1>
                            <h3 style="display:inline;"> Eventos </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_faqs }} </h1>
                            <h3 style="display:inline;"> Perguntas </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_avaliacoes }} </h1>
                            <h3 style="display:inline;"> Avaliações </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <div class="card-header p-4">
                            <h1 style="display:inline;"> {{ $count_noticias }} </h1>
                            <h3 style="display:inline;"> Notícias </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
