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
        Schema::create('eventos_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('fotos');
            $table->enum('tipo', ['1', '2', '3', '4']);
            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_fotos');
    }
};
