<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interesses', function (Blueprint $table) {
            $table->id();
            $table->date('data_leitura')->nullable();
            $table->enum('estado', ['lido', 'a_ler', 'quero_ler']);
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interesses');
    }
};
