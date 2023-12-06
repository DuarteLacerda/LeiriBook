<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'data', 'foto', 'user_id'];

    // Relacionamento com a tabela 'users'
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
