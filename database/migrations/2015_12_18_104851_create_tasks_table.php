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
	    $table->integer('order');
	    $table->integer('project_id');
	    $table->integer('user_id');
	    $table->integer('assignee_id');
            $table->string('title');
            $table->text('task_description');
            $table->text('user_comments');
            $table->text('alloted_hours');
            $table->text('hours_spent');
            $table->text('task_status_id');
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
