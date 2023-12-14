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
            <div class="slide" id="slide-1">
                <img src="https://images.unsplash.com/photo-1656464868371-602be27fd4c2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                    alt="3D rendering of an imaginary orange planet in space" />
                <div class="overlay">
                    <span class="hover-title">Your text here</span>
                    <span class="hover-desc">Your text here</span>
                </div>
            </div>
            <div class="slide" id="slide-2">
                <img src="https://images.unsplash.com/photo-1657586640569-4a3d4577328c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                    alt="3D rendering of an imaginary green planet in space" />
                <div class="overlay">
                    <span class="hover-title">Your text here</span>
                    <span class="hover-desc">Your text here</span>
                </div>
            </div>
            <div class="slide" id="slide-3">
                <img src="https://images.unsplash.com/photo-1656077217715-bdaeb06bd01f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                    alt="3D rendering of an imaginary blue planet in space" />
                <div class="overlay">
                    <span class="hover-title">Your text here</span>
                    <span class="hover-desc">Your text here</span>
                </div>
            </div>
            <button id="prev"><i class="fa-solid fa-chevron-right fa-rotate-180"></i></button>
            <button id="next"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</div>
<div class="sec3">
    <div class="cards">
        @foreach ($livros as $livro)
        <div class="card">
            <div class="image">
                @if ($livro->foto != null)
                <img src="{{ asset('storage/livro/'.$livro->foto) }}" alt="">
                @else
                <img src="{{ asset('images/admin/default-user.png') }}" alt="" />
                @endif
            </div>
            <div class="content">
                <a href="#">
                    <span class="title">
                        {{ $livro->titulo }}
                    </span>
                </a>
                <a class="action" href="#">
                    Saber mais
                    <span aria-hidden="true">
                        →
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