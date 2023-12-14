<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'autor', 'foto', 'edicao'];

    // Relacionamento com a tabela 'users'
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'livros_categorias', 'livro_id', 'categoria_id');
    }

}
