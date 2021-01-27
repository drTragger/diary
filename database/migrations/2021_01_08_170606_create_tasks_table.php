<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',60);
            $table->text('content');
            $table->string('file')->nullable();
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('group_id');
            $table->timestamps();
            
            $table->foreign('teacher_id')
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
        Schema::drop('tasks');
    }
}
