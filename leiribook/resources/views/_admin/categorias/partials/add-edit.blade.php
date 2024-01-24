<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="nome" class="control-label mb-1">Título:</label>
            <input id="nome" name="nome" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('nome',$categoria->nome) }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="descricao" class="control-label mb-1">Descrição:</label>
    <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp"
        data-val="true" rows="5">{{ old('descricao',$categoria->descricao) }}</textarea>
</div>
