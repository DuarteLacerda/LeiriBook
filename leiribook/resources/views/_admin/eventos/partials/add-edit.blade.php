<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="nome" class="control-label mb-1">Nome:</label>
            <input id="nome" name="nome" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('nome',$evento->nome) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="local" class="control-label mb-1">Local:</label>
            <input id="local" name="local" type="text" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('local',$evento->local) }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="descricao" class="control-label mb-1">Descrição:</label>
    <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp"
        data-val="true" rows="5">{{ old('descricao',$evento->descricao) }}</textarea>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="data_inicio" class="control-label mb-1">Data Inicial:</label>
            <input id="data_inicio" name="data_inicio" type="date" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('data_inicio',$evento->data_inicio) }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="data_fim" class="control-label mb-1">Data Final:</label>
            <input id="data_fim" name="data_fim" type="date" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('data_fim',$evento->data_fim)}}">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="user_id" class="control-label mb-1">ID do User:</label>
            <input id="user_id" name="user_id" type="number" class="form-control"
                aria-required="true" aria-invalid="false" value="{{ old('data_fim',$evento->user_id)}}">
        </div>
    </div>
</div>
