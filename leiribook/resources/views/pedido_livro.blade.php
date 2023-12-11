@extends('layout.master')
@section('title', 'Pedido para Livro')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paulo.css') }}">
@endsection
@section('content')

    <div class="text-section">
        <h1 class="title">Pedido de Livro</h1>
        <h2 class="desc-title">Não encontra um livro em particular? Faça um pedido para adicionarmos o livro em falta</h2>
    </div>

    <form class="form-request" action="#" method="post" enctype="multipart/form-data">
        <!-- Coluna da Esquerda -->
        <div class="column">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="4" required ></textarea>

            <label for="edicao">Nº de Edição</label>
            <input type="number" id="edicao" name="edicao" required>
        </div>

        <!-- Coluna da Direita -->
        <div class="column">
            <div class="upload-area" id="uploadArea" ondrop="handleDrop(event)" ondragover="handleDragOver(event)"
                ondragleave="handleDragLeave()">
                <p>Arraste e solte a imagem aqui ou </p>
                <input type="file" id="imagem" name="imagem" accept="image/*" onchange="displayImage()">
                <label id="image-pickup" for="imagem">clique para selecionar</label>
                <div id="preview"></div>
            </div>
        </div>

        <div class="button-container">
            <input id="request-submit" type="submit" value="Enviar">
        </div>
    </form>



    <script>
        function handleDragOver(event) {
            event.preventDefault();
            document.getElementById('uploadArea').classList.add('dragover');
        }

        function handleDragLeave() {
            document.getElementById('uploadArea').classList.remove('dragover');
        }

        function handleDrop(event) {
            event.preventDefault();
            document.getElementById('uploadArea').classList.remove('dragover');

            const fileInput = document.getElementById('imagem');
            const files = event.dataTransfer.files;

            if (files.length > 0) {
                fileInput.files = files;
                displayImage();
            }
        }

        function displayImage() {
            const fileInput = document.getElementById('imagem');
            const preview = document.getElementById('preview');

            while (preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            const file = fileInput.files[0];

            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.alt = 'Imagem selecionada';
                img.style.maxWidth = '100%';
                preview.appendChild(img);
            }
        }
    </script>



@endsection
