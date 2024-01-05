<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avaliacao extends Model
{

    protected $table = "avaliacoes";


    use HasFactory;

    protected $fillable = ['descricao', 'nivel', 'livro_id', 'user_id'];

    // Relacionamento com a tabela 'livros'
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    // Relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

