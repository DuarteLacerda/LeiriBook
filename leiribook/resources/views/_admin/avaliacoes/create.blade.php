@extends('layout.admin')
@section('title', 'Avaliações - Criar')
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
            <li class="list-inline-item seprate">
                <span>/</span>
            </li>
            <li class="list-inline-item active">
                <a href="{{ route('admin.avaliacoes.index') }}">Avaliações</a>
            </li>
            <li class="list-inline-item seprate">
                <span>/</span>
            </li>
            <li class="list-inline-item active">
                <a href="{{ route('admin.avaliacoes.create') }}">Criar</a>
            </li>
        </ul>
    </div>
    <button onclick="location.href='{{ route('admin.avaliacoes.index') }}'" class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-arrow-left"></i>Voltar
    </button>
@endsection
@section('content')
    <section>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Criar Nova Avaliação</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin.avaliacoes.store') }}" method="post">
                                @csrf
                                {{-- <div class="form-group">
                                <label for="question" class="control-label mb-1">Descrição:</label>
                                <input id="question" name="question" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="Descricao">
                            </div> --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="rating" class="control-label mb-1">Nível de Avaliação</label>
                                        <div class="input-group">
                                            <select name="rating" id="rating" class="form-control">
                                                <option value="">Selecione um nível</option>
                                                <option value="1">1 estrela</option>
                                                <option value="2">2 estrelas</option>
                                                <option value="3">3 estrelas</option>
                                                <option value="4">4 estrelas</option>
                                                <option value="5">5 estrelas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="descricao" class="control-label mb-1">Descrição:</label>
                                            <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp" data-val="true" placeholder="Escreve uma descrição aqui..."
                                                rows="5" autocomplete="cc-exp"></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="state" class="control-label mb-1">Livro</label>
                                        <div class="input-group">
                                            <select name="state" id="state" class="form-control">
                                                <option value="">Selecione o livro</option>
                                                {{-- quando este clica em selecionar o livro ira buscar atraves do livro id todos os livros que existem na base de dados com os nomes  --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-xl"></i>&nbsp;
                                        <span id="payment-button-amount">Criar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
