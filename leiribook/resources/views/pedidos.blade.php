@extends('layout.master')
@section('title', 'LeiriBook - Pedidos')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paulo.css') }}">
@endsection
@section('content')

    <div class="text-section">
        <h1 class="title">Pedidos para Livros</h1>
        <h2 class="desc-title">Descubra todos os pedidos feitos pelos nossos utilizadores.</h2>
    </div>

    <div class="pedidos-container">
        <div class="top-bar">
            <div class="icons-tray">
                <!-- Adicione os ícones aqui -->
                <button><span class="icon"><img id="grid-list" src="{{ asset('images/paulo/grid-icon.svg') }}"
                            alt="grid display"></span></button>
                <button><span class="icon"><img id="icon-list" src="{{ asset('images/paulo/list-icon.svg') }}"
                            alt="list display"></span></button>
            </div>
            <div class="search-bar">
                <!-- Adicione a barra de pesquisa aqui -->
                <input type="text" id="searchBar" placeholder="Pesquisar">
                <button id="search-btn"><span class="icon">🔍</span></button>
            </div>
        </div>
        <div class="pedidos-list">
            {{-- foreach... --}}

            @foreach ($pedidos as $pedido)
                <div class="pedido-card list-card">
                    <div class="pedido-foto">
                        <img src="{{ asset('storage/' . $pedido->foto) }}" alt="{{ $pedido->titulo }}">
                    </div>
                    <div class="pedido-info">
                        <h4 class="card-title">{{ $pedido->titulo }}</h4>
                        <div class="card-desc-wrapper">
                            <p class="card-desc">{{ $pedido->descricao }}</p>
                        </div>
                        <p class="card-user">pedido por {{ $pedido->user->name }}</p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <div class="pageBar">
        {{ $pedidos->links() }}
    </div>

@section('scripts')
    <script src="{{ asset('js/paulo.js') }}"></script>
@endsection
@endsection
