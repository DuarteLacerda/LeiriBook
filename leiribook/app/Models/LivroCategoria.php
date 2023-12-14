<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivroCategoria extends Model
{
    protected $table = 'livros_categorias';
    protected $fillable = ['livro_id', 'categoria_id'];

    // Add any additional methods or relationships if needed
}

