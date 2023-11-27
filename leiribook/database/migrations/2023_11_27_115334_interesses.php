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
            $table->date('data_leitura');
            $table->enum('estado', ['lido', 'a_ler', 'quero_ler']);
            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->integer('user_id')->unsigned();
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
