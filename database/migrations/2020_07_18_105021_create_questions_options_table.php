<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTable extends Migration
{

    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->string('option')->nullable();
            $table->tinyInteger('correct')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('questions_options');
    }
}
