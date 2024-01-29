<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;

    protected $fillable = ['data_leitura', 'estado', 'livro_id', 'user_id'];

    // Relacionamento com a tabela 'livros'
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    // Relationship with the 'users' table
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
