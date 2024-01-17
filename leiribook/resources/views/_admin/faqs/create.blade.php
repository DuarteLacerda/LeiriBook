@extends('layout.admin')
@section('title', 'FAQS - Criar')
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
            <a href="{{ route('admin.faqs.index') }}">Faqs</a>
        </li>
        <li class="list-inline-item seprate">
            <span>/</span>
        </li>
        <li class="list-inline-item active">
            <a href="{{ route('admin.faqs.create') }}">Criar</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.faqs.index') }}'" class="au-btn au-btn-icon au-btn--green">
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
                            <h3 class="text-center title-2">Nova Pergunta</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin.faqs.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="question" class="control-label mb-1">Pergunta:</label>
                                <input id="question" name="question" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="Pergunta">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="answer" class="control-label mb-1">Resposta:</label>
                                        <textarea id="answer" name="answer" type="text" class="form-control cc-exp"
                                            data-val="true" placeholder="Estado" rows="5" autocomplete="cc-exp"
                                            style="resize: none"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="approved" class="control-label mb-1">Estado</label>
                                    <div class="input-group">
                                        <select name="approved" id="approved" class="form-control">
                                            <option value="">Selecione um estado</option>
                                            <option value="0">Pendente</option>
                                            <option value="1">Aprovado</option>
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
