<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('exp');  // pengalaman (tahun)
            $table->integer('edu');  // pendidikan (skor 1-10)
            $table->integer('tech'); // teknis (skor 1-10)
            $table->integer('soft'); // soft skills (skor 1-10)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
