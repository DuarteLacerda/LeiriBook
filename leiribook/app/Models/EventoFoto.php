<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventoFoto extends Model
{
    use HasFactory;
    protected $table = 'eventos_fotos';
    protected $fillable = ['titulo', 'foto', 'ordem', 'evento_id'];

    // Relacionamento com a tabela 'eventos'
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function getFotoUrlAttribute()
    {
        return asset("storage/eventos_fotos/{$this->attributes['foto']}");
    }
}
