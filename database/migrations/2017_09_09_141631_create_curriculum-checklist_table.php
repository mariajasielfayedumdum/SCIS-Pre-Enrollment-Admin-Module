<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_checklist', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('curriculumID');
		    $table->integer('checklistID')->unsigned();
		    $table->string('curYear', 45);
		    $table->string('curriculum', 45);
		    
		    $table->primary('curriculumID');
		
		    $table->index('checklistID','checklistID_idx');
		
		    $table->foreign('checklistID')
		        ->references('checklistID')->on('t')
		        ->onUpdate('cascade');
		
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
        Schema::dropIfExists('curriculum_checklist');
    }
}
