<div class="row">
    <div class="col">
        <label for="rating" class="control-label mb-1">Nível de Avaliação</label>
        <div class="input-group">
            <select name="rating" id="rating" class="form-control">
                <option value="" {{ old('rating', $avaliacao->nivel) === '' ? 'selected' : '' }}>Selecione um nível</option>
                <option value="1" {{ old('rating', $avaliacao->nivel) == '1' ? 'selected' : '' }}>1 estrela</option>
                <option value="2" {{ old('rating', $avaliacao->nivel) == '2' ? 'selected' : '' }}>2 estrelas</option>
                <option value="3" {{ old('rating', $avaliacao->nivel) == '3' ? 'selected' : '' }}>3 estrelas</option>
                <option value="4" {{ old('rating', $avaliacao->nivel) == '4' ? 'selected' : '' }}>4 estrelas</option>
                <option value="5" {{ old('rating', $avaliacao->nivel) == '5' ? 'selected' : '' }}>5 estrelas</option>
            </select>
        </div>

    </div>
    <div class="col">
        <div class="form-group">
            <label for="descricao" class="control-label mb-1">Descrição:</label>
            <textarea id="descricao" name="descricao" type="text" class="form-control cc-exp" data-val="true" placeholder="Escreve uma descrição aqui..."
                rows="5" autocomplete="cc-exp">{{old('descricao', $avaliacao->descricao)}}</textarea>
        </div>
    </div>

    <div class="col">
        <label for="livro" class="control-label mb-1">Livro</label>
        <div class="input-group">
            <select name="livro" id="livro" class="form-control">
                <option value=""{{ old('livro', $avaliacao->livro_id) === '' ? 'selected' : '' }} >Selecione o Livro</option>
                {{-- quando este clica em selecionar o livro ira buscar atraves do livro id todos os livros que existem na base de dados com os nomes  --}}
                @foreach ($livros as $livro)
                <option value="{{$livro->id}}" {{ old('livro', $avaliacao->livro_id) === $livro->id ? 'selected' : '' }}>{{$livro->titulo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col">
        <label for="user" class="control-label mb-1">Utilizador</label>
        <div class="input-group">
            <select name="user" id="user" class="form-control">
                <option value="" {{ old('user', $avaliacao->user_id) === '' ? 'selected' : '' }} >Selecione o Utilizador</option>
                {{-- quando este clica em selecionar o utilizador ira buscar atraves do utilizador id todos os utilizadores que existem na base de dados com os nomes  --}}
                @foreach ($utilizadores as $utilizador)
                <option value="{{$utilizador->id}}"{{ old('user', $avaliacao->user_id) === $utilizador->id ? 'selected' : '' }}>{{$utilizador->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

