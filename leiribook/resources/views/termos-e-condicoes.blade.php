@extends('layout.master')
@section('title', 'Termos e Condições')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paulo.css') }}">
@endsection
@section('content')

    <section id="tc-section">

        <h1 class="tc-title">Termos e Condições da LeiriBook</h1>

        <h2>1. Aceitação dos Termos</h2>
        <p>1.1 Ao aceder e utilizar o site da LeiriBook, concorda em cumprir e ficar vinculado a estes Termos e Condições.
        </p>

        <h2>2. Utilização do Site</h2>
        <p>2.1 O conteúdo do site da LeiriBook é fornecido apenas para fins informativos e educacionais. Não garantimos a
            precisão, atualidade ou integridade das informações.</p>
        <p>2.2 Ao interagir com o site, concorda em não realizar atividades ilegais, prejudiciais ou que possam interferir
            no
            funcionamento adequado do site.</p>

        <h2>3. Inscrição e Membros</h2>
        <p>3.1 A inscrição no site da LeiriBook pode exigir informações pessoais. Ao se inscrever, concorda em fornecer
            informações precisas e atualizadas.</p>
        <p>3.2 A LeiriBook reserva-se o direito de suspender ou encerrar contas de membros que violem estes Termos e
            Condições.
        </p>

        <h2>4. Propriedade Intelectual</h2>
        <p>4.1 Todo o conteúdo disponível no site da LeiriBook, incluindo textos, imagens, logotipos, é protegido por
            direitos
            de autor e outros direitos de propriedade intelectual.</p>

        <h2>5. Links para Terceiros</h2>
        <p>5.1 O site da LeiriBook pode conter links para sites de terceiros. Não nos responsabilizamos pelo conteúdo ou
            práticas de privacidade desses sites.</p>

        <h2>6. Alterações nos Termos</h2>
        <p>6.1 Reservamo-nos o direito de modificar estes Termos e Condições a qualquer momento. Alterações entrarão em
            vigor
            imediatamente após a publicação.</p>

        <h2>7. Política de Privacidade</h2>
        <p>7.1 Ao utilizar o site da LeiriBook, concorda com a nossa <a href="{{ route('politica_privacidade') }}">Política
                de
                Privacidade</a>.</p>

        <h2>8. Contacto</h2>
        <p>8.1 Para questões relacionadas a estes Termos e Condições, entre em contacto connosco através de <a href="mailto:leiribook.contact@gmail.com">leiribook.contact@gmail.com</a>.</p>

    </section>

@endsection
