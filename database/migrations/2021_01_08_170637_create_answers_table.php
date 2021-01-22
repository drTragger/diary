<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('owner_id');
            $table->text('content');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('task_id');
            $table->timestamps();


            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');
            $table->foreign('owner_id')
                ->references('id')
                ->on('users');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
    }
}
