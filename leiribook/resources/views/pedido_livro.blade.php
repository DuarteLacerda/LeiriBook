@extends('layout.master')
@section('title', 'LeiriBook - Pedido para Livro')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paulo.css') }}">
@endsection
@section('content')

    <div class="text-section">
        <h1 class="title">Pedido de Livro</h1>
        <h2 class="desc-title">Não encontra um livro em particular? Faça um pedido para adicionarmos o livro em falta</h2>
    </div>

    <form class="form-request" action="{{ route('enviar-pedido') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @csrf
        <!-- Coluna da Esquerda -->
        <div class="column">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>

            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="4" required>{{ old('descricao') }}</textarea>

            <label for="edicao">Nº de Edição</label>
            <input type="number" id="edicao" name="edicao" value="{{ old('edicao') }}" required>
        </div>

        <!-- Coluna da Direita -->
        <div class="column">
            <div class="upload-area" id="uploadArea" ondrop="handleDrop(event)" ondragover="handleDragOver(event)"
                ondragleave="handleDragLeave()">
                <div id="uploadContent">
                    <p id="uploadText">Arraste e solte a imagem aqui ou </p>
                    <input type="file" id="foto" name="foto" accept="image/*" onchange="displayImage()" multiple>
                    <label id="image-pickup" for="foto">clique para selecionar</label>
                </div>
                <div id="previewContainer" style="position: relative; max-width: 100%; max-height: 80vh; overflow: hidden;">
                    <!-- Adiciona um botão "X" no canto superior direito da caixa de upload -->

                    <span id="cancelButton" onclick="cancelUpload()" style="visibility: hidden;"
                        src="{{ asset('images/paulo/close-icon.png') }}"></span>
                </div>
            </div>
            <!-- Mantém o botão de upload fora da área de visualização -->

        </div>
        <div class="button-container">
            <input id="request-submit" type="submit" value="Enviar">
        </div>
    </form>






    <br>
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Error</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>

    <br>

    <!-- Your Script Goes Here -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>




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

            const fileInput = document.getElementById('foto');
            const files = event.dataTransfer.files;

            if (files.length > 0) {
                fileInput.files = files;
                displayImage();
            }
        }

        function displayImage() {
            const fileInput = document.getElementById('foto');
            const uploadContent = document.getElementById('uploadContent');
            const preview = document.getElementById('previewContainer');
            const cancelButton = document.getElementById('cancelButton');

            // Limpa a visualização existente

            if (preview.getElementsByTagName('img').length > 0)
                preview.getElementsByTagName('img')[0].remove();

            // Verifica se foram selecionadas imagens
            if (fileInput.files.length > 0) {
                // Oculta o conteúdo da caixa de upload
                uploadContent.style.display = 'none';

                // Itera sobre as imagens selecionadas
                for (const file of fileInput.files) {
                    // Cria uma nova imagem
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = 'Imagem selecionada';

                    // Adiciona a nova imagem à visualização
                    preview.appendChild(img);
                }

                // Exibe a visualização
                preview.style.display = 'block';

                // Torna o botão de cancelar visível
                cancelButton.style.visibility = 'visible';
            }
        }

        function cancelUpload() {
            const fileInput = document.getElementById('foto');
            const uploadContent = document.getElementById('uploadContent');
            const preview = document.getElementById('previewContainer');
            const cancelButton = document.getElementById('cancelButton');

            // Limpa o input de arquivo
            fileInput.value = '';

            // Exibe novamente o conteúdo da caixa de upload
            uploadContent.style.display = 'block';

            // Limpa a visualização
            if (preview.getElementsByTagName('img').length > 0)
                preview.getElementsByTagName('img')[0].remove();

            // Oculta a visualização
            preview.style.display = 'none';

            // Torna o botão de cancelar invisível
            cancelButton.style.visibility = 'hidden';
        }



        // // Open the Error Modal if there are any validation errors
        // @if ($errors->any())
        //     $(document).ready(function() {
        //         $('#errorModal').modal('show');
        //     });
        // @endif

        // // Open the Success Modal if there is a success message
        // @if (session('success'))
        //     $(document).ready(function() {
        //         $('#successModal').modal('show');
        //     });
        // @endif

        @if ($errors->any())
            // Close the error modal if it exists
            $('.alert-danger .close').click(function() {
                $(this).closest('.alert-danger').alert('close');
            });
        @endif
    </script>


@endsection
