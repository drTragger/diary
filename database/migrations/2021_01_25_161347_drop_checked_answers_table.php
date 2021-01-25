<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCheckedAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('checked_answers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('checked_answers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('answer_id');
            $table->unsignedInteger('group_id');
            $table->text('content');
            $table->unsignedTinyInteger('score', false);
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')
                ->on('users');
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');
        });
    }
}
