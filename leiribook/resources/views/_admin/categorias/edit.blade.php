@extends('layout.admin')
@section('title', 'Categorias - Editar')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/add_edit_upload_imagem.css') }}">
@endsection
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
            <a href="{{ route('admin.categorias.index') }}">Categorias</a>
        </li>
        <li class="list-inline-item seprate">
            <span>/</span>
        </li>
        <li class="list-inline-item active">
            <a href="{{ route('admin.categorias.edit', $categoria) }}">Editar</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.categorias.index') }}';" class="au-btn au-btn-icon au-btn--green">
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
                        <form action="{{ route('admin.categorias.update', $categoria) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('_admin.categorias.partials.add-edit')
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
