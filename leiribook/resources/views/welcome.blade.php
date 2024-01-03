@extends('layout.master')
@section('title', 'LeiriBook - Página Principal')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

<button onclick="topFunction()" id="myBtn" title="Ir para cima"><i class="fa-solid fa-arrow-up"></i></button>
<div class="sec1">
    <div class="sec1_title">
        <h1>Leiribook</h1>
        <h2>Ler para Crescer</h2>
    </div>
    <a href="#sec2">
        <div class='icon-scroll'></div>
    </a>
</div>
<div class="sec2" id="sec2">
    <div class="slider-wrapper">
        <div class="slider">
            @foreach ($eventos as $evento)
            <div class="slide">
                @if ($evento->fotos->isNotEmpty())
                <img src="{{ asset('storage/eventos_fotos/'.$evento->fotos->first()->foto) }}" alt="">
                @else
                <img src="{{ asset('images/admin/default-user.png') }}" alt="" />
                @endif
                <div class="overlay">
                    <span class="hover-title">{{ $evento->nome }}</span>
                    <span class="hover-desc">{{ $evento->descricao }}</span>
                </div>
            </div>
            @endforeach
            <button id="prev"><i class="fa-solid fa-chevron-right fa-rotate-180"></i></button>
            <button id="next"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</div>
<div class="sec3">
    <div class="cards">
        @foreach ($livros as $livro)
        <div class="card">
            <div class="image" id="image">
                @if ($livro->foto != null)
                <img src="{{ asset('storage/books/'.$livro->foto) }}" alt="">
                @else
                <img src="{{ asset('images/admin/default-user.png') }}" alt="" />
                @endif
            </div>
            <div class="content">
                <span class="title">
                    {{ $livro->titulo }}
                </span>
                <a class="action" href="#">
                    Saber mais
                    <span aria-hidden="true">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/welcome.js') }}"></script>
@endsection