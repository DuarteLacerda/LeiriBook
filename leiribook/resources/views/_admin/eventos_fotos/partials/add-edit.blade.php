<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="titulo" class="control-label mb-1">Titulo:</label>
            <input id="titulo" name="titulo" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('titulo',$foto->titulo) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="ordem" class="control-label mb-1">Ordem:</label>
            <input id="ordem" name="ordem" type="number" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('ordem',$foto->ordem) }}">
        </div>
    </div>
</div>

<div class="col-6">
    <div class="form-group">
        <label for="foto" class=" form-control-label">Inserir</label>
        <input type="file" id="foto" name="foto" class="form-control-file"
            onchange="previewFile()">
    </div>
    @if ($foto->foto)
            <img id="preview" src="{{ asset('storage/eventos_fotos/' . $foto->foto) }}"
                                            alt="" style="height: 150px">
    @else

    <img id="preview" src="" alt="" style="height: 150px">
    @endif
</div>

