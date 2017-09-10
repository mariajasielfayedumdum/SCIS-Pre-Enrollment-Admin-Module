<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('checklist', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('checklistID');
		    $table->string('coursenumber', 85);
		    $table->string('course', 6);
		    $table->integer('units');
		    $table->string('destitle', 150);
		    $table->string('term', 35);
		    $table->integer('subyear');
		    $table->string('type', 45)->default(null);
		
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
        Schema::dropIfExists('checklist');
    }
}
