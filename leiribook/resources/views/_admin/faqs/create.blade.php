@extends('layout.admin')
@section('title', 'FAQS - Create')
@section('breadcrumb')
<div class="au-breadcrumb-left">
    <span class="au-breadcrumb-span">You are here:</span>
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
<div>
    <button onclick="location.href='{{ route('admin.faqs.index') }}'" class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-arrow-left"></i>Voltar
    </button>
</div>
@endsection
@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1>Criar</h1>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{ route('admin.faqs.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="question" placeholder="Pergunta" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="answer" placeholder="Resposta" class="form-control"
                                            rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-md">Submeter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
