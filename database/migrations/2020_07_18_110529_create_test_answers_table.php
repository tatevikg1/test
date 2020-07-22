<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAnswersTable extends Migration
{

    public function up()
    {
        Schema::create('test_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id');
            $table->foreignId('question_id');
            $table->integer('correct')->nullable();
            $table->foreignId('questions_option_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('test_answers');
    }
}
