@extends('layout.admin')
@section('title', 'FAQS - Create')
@section('breadcrumb')
<ul class="list-unstyled list-inline au-breadcrumb__list">
    <li class="list-inline-item">
        <p>Home</p>
    </li>
    <li class="list-inline-item seprate">
        <span>/</span>
    </li>
    <li class="list-inline-item active">
        <a href="{{ route('admin.dashboard') }}">Dashboard<a>
    </li>
    <li class="list-inline-item seprate">
        <span>/</span>
    </li>
    <li class="list-inline-item active">
        <a href="{{ route('admin.faqs.index') }}">Faqs<a>
    </li>
    <li class="list-inline-item seprate">
        <span>/</span>
    </li>
    <li class="list-inline-item active">
        <a href="{{ route('admin.faqs.create') }}">Criar<a>
    </li>
</ul>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Criar</h1>
        </div>
    </div>
</div>
@endsection