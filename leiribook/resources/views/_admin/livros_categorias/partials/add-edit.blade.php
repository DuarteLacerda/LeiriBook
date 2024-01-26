<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="nome" class="control-label mb-1">Título:</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="">Selecione um género</option>
                @foreach ($categoriasNotInLivro as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
