<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferedSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('offered_subjects', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('offeredID');
		    $table->integer('subjectID');
		    $table->string('course', 4);
		    $table->string('term', 45);
		    
		    $table->primary('offeredID');
		
		    $table->index('subjectID','subID_idx');
		
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
        Schema::dropIfExists('offered_subjects');
    }
}
