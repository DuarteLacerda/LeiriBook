<style>
    input[type="file"] {
        padding: 5px;
        position: relative;
    }

    input[type="file"]::file-selector-button {
        border-radius: 5px;
        padding: 0 21px;
        height: 40px;
        cursor: pointer;
        background-color: white;
        border: 1px solid gray;
        margin-right: 10px;
        color: transparent;
    }

    input[type="file"]::before {
        position: absolute;
        top: 15px;
        left: 15px;
        height: 20px;
        width: 20px;
        content: "";
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230964B0'%3E%3Cpath d='M18 15v3H6v-3H4v3c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-3h-2zM7 9l1.41 1.41L11 7.83V16h2V7.83l2.59 2.58L17 9l-5-5-5 5z'/%3E%3C/svg%3E");
    }

    input[type="file"]::after {
        position: absolute;
        pointer-events: none;
        top: 13px;
        left: 40px;
        color: #0964b0;
        content: "Escolher ficheiro";
    }
</style>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="titulo" class="control-label mb-1">Titulo:</label>
            <input id="titulo" name="titulo" type="text" class="form-control" aria-required="true"
                aria-invalid="false" value="{{ old('titulo', $foto->titulo) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="ordem" class="control-label mb-1">Ordem:</label>
            <input id="ordem" name="ordem" type="number" class="form-control" aria-required="true"
                aria-invalid="false" value="{{ old('ordem', $foto->ordem) }}">
        </div>
    </div>
</div>

<div class="col-6 mb-3">
    <div class="form-group">
        <label for="foto" class=" form-control-label">Inserir</label>
        <input type="file" id="foto" name="foto" class="form-control-file" onchange="previewFile()">
    </div>
    @if ($foto->foto)
        <img id="preview" src="{{ asset('storage/eventos_fotos/' . $foto->foto) }}" alt=""
            style="height: 150px">
    @else
        <img id="preview" src="" alt="" style="height: 150px">
    @endif
</div>
