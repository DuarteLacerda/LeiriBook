<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="titulo" class="control-label mb-1">Titulo:</label>
            <input id="titulo" name="titulo" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('titulo',$noticia->titulo) }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="descricao" class="control-label mb-1">Descrição:</label>
    <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp"
        data-val="true" rows="5">{{ old('descricao',$noticia->descricao) }}</textarea>
</div>
<div class="row">
    <div class="col mb-3">
        <div class="form-group">
            <label for="foto" class=" form-control-label">Inserir</label>
            <input type="file" id="foto" name="foto" class="form-control-file" onchange="previewFile()">
        </div>
        @if ($noticia->foto)
        <img id="preview" src="{{ asset('storage/noticias/' . $noticia->foto) }}" alt="Photo Preview" style="height: 150px">
    @else
        <img id="preview" src="" alt="" style="height: 150px">
    @endif
    </div>

</div>
