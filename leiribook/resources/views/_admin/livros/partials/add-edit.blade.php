<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="titulo" class="control-label mb-1">Título:</label>
            <input id="titulo" name="titulo" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('titulo',$livro->titulo) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="autor" class="control-label mb-1">Autor:</label>
            <input id="autor" name="autor" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('autor',$livro->autor) }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="descricao" class="control-label mb-1">Descrição:</label>
    <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp"
        data-val="true" rows="5">{{ old('descricao',$livro->descricao) }}</textarea>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="edicao" class="control-label mb-1">Edição:</label>
            <input id="edicao" name="edicao" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('edicao',$livro->edicao) }}">
        </div>
    </div>
</div>
<div class="col-6 mb-3">
    <div class="form-group">
        <label for="foto" class=" form-control-label">Inserir capa</label>
        <input type="file" id="foto" name="foto" class="form-control-file" onchange="previewFile()">
    </div>
    @if ($livro->foto)
        <img id="preview" src="{{ asset('storage/books/' . $livro->foto) }}" alt=""
            style="height: 150px">
    @else
        <img id="preview" src="" alt="" style="height: 150px">
    @endif
</div>
