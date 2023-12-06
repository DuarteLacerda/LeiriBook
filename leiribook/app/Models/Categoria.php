<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    // Relacionamento com a tabela 'livros' (exemplo)
    public function livros()
    {
        return $this->hasMany(Livro::class, 'categoria_id');
    }
}
