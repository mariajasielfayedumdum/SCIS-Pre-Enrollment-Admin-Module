<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('subjectID');
		    $table->string('coursenumber', 45);
		    $table->string('destitle', 85);
		    $table->integer('units');
		    $table->string('type', 45);
		
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
        Schema::dropIfExists('subjects');
    }
}
