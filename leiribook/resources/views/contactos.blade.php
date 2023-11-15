@extends('layout.master')
@section('title', 'LeiriBook-Contactos')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')

    <h1 id="pagetitle">Contactos</h1>
    <div class="newsletter-form">
        <h2>Receba as novidades</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="dob">Data de nascimento:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Inscreva-se">
            </div>
        </form>
    </div>
@endsection
