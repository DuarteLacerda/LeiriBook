<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}

