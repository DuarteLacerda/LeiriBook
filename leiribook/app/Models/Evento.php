<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim', 'local', 'user_id'];

    // Relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com a tabela 'eventos_photos' (se existir)
    public function fotos()
    {
        return $this->hasMany(EventoFoto::class, 'evento_id');
    }
}
