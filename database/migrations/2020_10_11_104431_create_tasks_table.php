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
            $table->unsignedBigInteger('project');

            $table->string('task_name');
            $table->string('task_detail');
            $table->string('type_task');

            $table->string('workday');
            $table->string('weekend');
            $table->string('monthly');
            $table->string('others');
            $table->string('yearly');

            $table->string('start_date');
            $table->string('end_date');

            $table->unsignedBigInteger('assigned_person');
            $table->unsignedBigInteger('assigned_to');
            $table->string('message');  
            $table->longText('remark');
            
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
