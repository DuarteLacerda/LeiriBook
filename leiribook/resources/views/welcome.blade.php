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
        <br>
        <h2>Ler para Crescer</h2>
        <br>
        <hr style="width: 100%;">
    </div>
    <a href="#sec2">
        <div class='icon-scroll'></div>
    </a>
</div>
<div class="sec2" id="sec2">
    <div class="cards1">
        <div class="card1">
        </div>
        <div class="card2">
            <div class="text"></div>
        </div>
    </div>
</div>
<div class="sec3">
    <div class="cards">
        @foreach ($eventos as $evento)
        <div class="card">
            <div class="image">
                <img src="{{ asset('storage/eventos/'.$evento->foto) }}" alt="">
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