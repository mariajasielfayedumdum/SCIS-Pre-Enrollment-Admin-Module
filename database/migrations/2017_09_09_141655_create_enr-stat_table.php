<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrStatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enr_stat', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->string('coursenumber', 30);
		    $table->string('term', 35);
		    $table->integer('number_of_students')->default('0');
		    
		    $table->primary('coursenumber', 'term');
		
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
        Schema::dropIfExists('enr_stat');
    }
}
