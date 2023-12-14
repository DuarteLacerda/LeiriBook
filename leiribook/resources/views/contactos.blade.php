@extends('layout.master')
@section('title', 'LeiriBook - Contactos')
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
    <div id="location">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d370.227918486206!2d-8.842207327272678!3d39.72691130291961!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd220ca9efda704d%3A0x5156ce4c50e3195f!2sRua%20dos%20Parceiros%202104%2C%202400-497%20Parceiros!5e1!3m2!1spt-PT!2spt!4v1700053947059!5m2!1spt-PT!2spt"
            width="68%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
