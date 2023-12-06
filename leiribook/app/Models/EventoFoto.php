<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFoto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'fotos', 'tipo', 'evento_id'];

    // Relacionamento com a tabela 'eventos'
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
