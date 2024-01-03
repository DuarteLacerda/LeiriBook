@extends('layout.admin')
@section('title', 'Eventos - Editar')
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
            <a href="{{ route('admin.eventos.edit', $evento) }}">Editar</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.eventos.index') }}';" class="au-btn au-btn-icon au-btn--green">
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
                            <h3 class="text-center title-2">Editar</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin.eventos.update', $evento) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="question" class="control-label mb-1">Pergunta:</label>
                                <input id="question" name="question" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" value="{{ $evento->question }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="answer" class="control-label mb-1">Resposta:</label>
                                        <textarea id="answer" name="answer" type="text" class="form-control cc-exp"
                                            data-val="true" placeholder="Estado" rows="5">{{ $evento->answer }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="state" class="control-label mb-1">Estado</label>
                                    <div class="input-group">
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Selecione um estado</option>
                                            <option value="0" {{ ($evento->approved === 0) ? 'selected' : '' }}>Pendente
                                            </option>
                                            <option value="1" {{ ($evento->approved !== 0) ? 'selected' : '' }}>Aprovado
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-edit fa-xl"></i>&nbsp;
                                    <span id="payment-button-amount">Editar</span>
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
