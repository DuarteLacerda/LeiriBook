@extends('layout.master')
@section('title', 'LeiriBook - FAQS')

@section('content')
<div class="container" id="faq-container" style="margin-top: 5rem">
    <!-- Cartões de Perguntas serão adicionados aqui via jQuery -->
    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Que eventos é que a <strong>Leiribook</strong> promove regularmente?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                aria-controls="collapse1">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse1" class="collapse">
            <div class="card-body">
                Organizamos uma variedade de eventos, incluindo discussões de livros, palestras com autores, e clubes do
                livro. Consulte o nosso calendário de eventos para obter informações atualizadas.
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Como é que posso participar em eventos da <strong>Leiribook</strong>?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
                aria-controls="collapse2">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse2" class="collapse">
            <div class="card-body">
                Para participar dos eventos, basta verificar o calendário no nosso site e seguir as instruções de
                inscrição ou comparecer aos eventos abertos.
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Como posso sugerir um livro para a leitura em grupo?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
                aria-controls="collapse3">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse3" class="collapse">
            <div class="card-body">
                Aceitamos sugestões de leitura. Envie as suas recomendações para <a
                    href="mailto:leirbook.contact@gmail.com">leirbook.contact@gmail.com</a> ou através do
                formulário de contato no nosso site <a href="{{ route('contactos') }}">Aqui</a>.
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Posso doar livros à associação? Como proceder?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
                aria-controls="collapse4">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse4" class="collapse">
            <div class="card-body">
                Sim, aceitamos doações de livros. Entre em contato connosco através do formulário de <a
                    href="{{ route('contactos') }}">contacto</a> para obter mais informações.
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Qual é a política de privacidade da <strong>Leiribook</strong> em relação aos dados dos membros?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse5" aria-expanded="true"
                aria-controls="collapse5">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse5" class="collapse">
            <div class="card-body">
                Respeitamos a privacidade dos nossos membros. Consulte as nossas <a
                    href="{{ route('politica_privacidade') }}">políticas de
                    privacidade</a>
                para obter informações detalhadas sobre como tratamos e protegemos os dados pessoais.
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Como é que posso entrar em contato com a equipa da <strong>Leiribook</strong> em caso de dúvidas ou
                preocupações?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse6" aria-expanded="true"
                aria-controls="collapse6">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse6" class="collapse">
            <div class="card-body">
                Você pode entrar em contato conosco através do formulário de <a
                    href="{{ route('contactos') }}">contacto</a> em nosso site. Estamos aqui para ajudar!
            </div>
        </div>
    </div>

    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Posso sugerir tópicos ou autores para futuros eventos ou discussões?
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse7" aria-expanded="true"
                aria-controls="collapse7">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse7" class="collapse">
            <div class="card-body">
                Sim, encorajamos sugestões de membros. Envie as suas ideias para <a
                    href="mailto:leiribook.contact@gmail.com">leiribook.contact@gmail.com</a> ou através do
                formulário de <a href="{{ route('contactos') }}">contacto</a>.
            </div>
        </div>
    </div>

    <!-- Adicione mais cartões conforme necessário -->

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/duarte-faqs.js') }}"></script>
@endsection