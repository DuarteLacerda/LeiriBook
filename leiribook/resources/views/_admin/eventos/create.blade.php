@extends('layout.admin')
@section('title', 'Eventos - Criar')
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
            <a href="{{ route('admin.eventos.index') }}">Eventos</a>
        </li>
        <li class="list-inline-item seprate">
            <span>/</span>
        </li>
        <li class="list-inline-item active">
            <a href="{{ route('admin.eventos.create') }}">Criar</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.eventos.index') }}'" class="au-btn au-btn-icon au-btn--green">
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
                            <h3 class="text-center title-2">Criar</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin.eventos.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="question" class="control-label mb-1">Nome:</label>
                                        <input id="question" name="question" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $evento->nome }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="question" class="control-label mb-1">Local:</label>
                                        <input id="question" name="question" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $evento->local }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer" class="control-label mb-1">Descrição:</label>
                                <textarea id="answer" name="answer" type="text" class="form-control cc-exp"
                                    data-val="true" rows="5">{{ $evento->descricao }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="question" class="control-label mb-1">Data Inicial:</label>
                                        <input id="question" name="question" type="date" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $evento->data_inicio }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="question" class="control-label mb-1">Data Final:</label>
                                        <input id="question" name="question" type="date" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $evento->data_fim }}">
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
