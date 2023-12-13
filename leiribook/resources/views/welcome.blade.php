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
            <img id="slide-1"
                src="https://images.unsplash.com/photo-1656464868371-602be27fd4c2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                alt="3D rendering of an imaginary orange planet in space" />
            <img id="slide-2"
                src="https://images.unsplash.com/photo-1657586640569-4a3d4577328c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                alt="3D rendering of an imaginary green planet in space" />
            <img id="slide-3"
                src="https://images.unsplash.com/photo-1656077217715-bdaeb06bd01f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"
                alt="3D rendering of an imaginary blue planet in space" />
        </div>
        <div class="slider-nav">
            <a href="#slide-1"></a>
            <a href="#slide-2"></a>
            <a href="#slide-3"></a>
        </div>
    </div>
</div>
<div class="sec3">
    <div class="cards">
        @foreach ($eventos as $evento)
        <div class="card">
            <div class="image">
                @if ($evento->fotos->isNotEmpty())
                <img src="{{ asset('storage/eventos/'.$evento->foto) }}" alt="">
                @else
                <img src="{{ asset('images/admin/default-user.png') }}" alt="" />
                @endif
            </div>
            <div class="content">
                <a href="#">
                    <span class="title">
                        {{ $evento->nome }}
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