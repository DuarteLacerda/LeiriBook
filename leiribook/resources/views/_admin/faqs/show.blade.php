@extends('layout.admin')
@section('title', 'FAQS - Detalhes')
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
            <p>Detalhes</p>
        </li>
    </ul>
</div>
<div>
    <button onclick="location.href='{{ route('admin.faqs.index') }}';" class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-arrow-left"></i>Voltar</button>
</div>
@endsection
@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Detalhes</h1>
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
                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                        <div class="au-card-inner">
                            <form method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="question" placeholder="Pergunta" class="form-control"
                                            value="{{ $faq->question }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="answer" placeholder="Resposta" class="form-control" rows="6"
                                            readonly>{{ $faq->answer }}</textarea>
                                    </div>
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