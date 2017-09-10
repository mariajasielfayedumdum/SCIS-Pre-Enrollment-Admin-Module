<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverloadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('overloading', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('overloadID');
		    $table->integer('subjectID');
		    $table->integer('id_number');
		    $table->string('status', 45);
		    $table->string('term', 35);
		
		    $table->index('subjectID','subjID_idx');
		
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
        Schema::dropIfExists('overloading');
    }
}
