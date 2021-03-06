<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('lecName');
            $table->string('lecImg');
            $table->string('lecUrl');
            $table->integer('quizuId');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course');
            $table->integer('order1')->nullable();
            $table->integer('completeId')->nullable();
            $table->integer('completedQuiz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
};
