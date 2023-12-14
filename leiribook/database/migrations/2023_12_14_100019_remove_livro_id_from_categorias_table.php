<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveLivroIdFromCategoriasTable extends Migration
{
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropForeign(['livro_id']);
            $table->dropColumn('livro_id');
        });
    }

    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros');
        });
    }
}

