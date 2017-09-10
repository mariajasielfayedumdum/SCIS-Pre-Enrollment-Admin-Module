<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('students', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('id_number');
		    $table->string('last_name', 45);
		    $table->string('first_name', 45);
		    $table->string('course', 6);
		    $table->integer('year');
		    $table->string('curriculum', 45)->default(null);
		    
		    $table->primary('id_number');
		
		    $table->unique('id_number','id_number_UNIQUE');
		
		    $table->index('course','course_idx');
		
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
        Schema::dropIfExists('students');
    }
}
