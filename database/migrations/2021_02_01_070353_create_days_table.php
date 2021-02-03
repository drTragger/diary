<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('schedule_id');
            $table->tinyInteger('day');
            $table->timestamp('datetime');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('days');
    }
}
