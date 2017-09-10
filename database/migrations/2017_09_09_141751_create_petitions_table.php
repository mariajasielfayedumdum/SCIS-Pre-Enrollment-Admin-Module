<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('petitions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('petID');
		    $table->integer('subjectID');
		    $table->integer('id_number');
		    $table->string('term', 35);
		
		    $table->index('subjectID','subjectID_idx');
		
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
        Schema::dropIfExists('petitions');
    }
}
