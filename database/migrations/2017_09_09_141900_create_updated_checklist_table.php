<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatedChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updated_checklist', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('updCheckID');
		    $table->integer('curriculumID');
		    $table->string('status', 45);
		    $table->integer('id_number');
		    $table->integer('checklistID')->unsigned();
		
		    $table->index('curriculumID','curriculumID_idx');
		    $table->index('checklistID','checkID_idx');
		
		    $table->foreign('checklistID')
		        ->references('curriculumID')->on('t')
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
        Schema::dropIfExists('updated_checklist');
    }
}
