<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('input_date');
            $table->string('project');

            $table->string('task_name');
            $table->string('task_detail');
            $table->string('type_task');

            $table->string('workday');
            $table->string('weekend');
            $table->string('start_date');

            $table->string('end_date');
            $table->string('assigned_person');
            $table->string('assigned_to');
            $table->string('message');  
            
            $table->string('progress');
            $table->string('status');
            $table->string('completedate');
            
           

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
        Schema::dropIfExists('tasks');
    }
}
