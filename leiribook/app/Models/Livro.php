<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'autor', 'foto', 'edicao', 'user_id'];

    // Relacionamento com a tabela 'users'
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
