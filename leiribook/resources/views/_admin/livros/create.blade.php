@extends('layout.admin')
@section('title', 'Livros - Criar')
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
            <a href="{{ route('admin.livros.index') }}">Livros</a>
        </li>
        <li class="list-inline-item seprate">
            <span>/</span>
        </li>
        <li class="list-inline-item active">
            <a href="{{ route('admin.livros.create') }}">Criar</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.livros.index') }}'" class="au-btn au-btn-icon au-btn--green">
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
                        <form action="{{ route('admin.livros.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('_admin.livros.partials.add-edit')
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
@section('scripts')
<script>
    function previewFile() {
        const preview = document.querySelector('#preview');
        const file = document.querySelector('#foto').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
