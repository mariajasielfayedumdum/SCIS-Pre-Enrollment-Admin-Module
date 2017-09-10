<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreEnrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_enroll', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('preid');
		    $table->integer('id_number');
		    $table->string('coursenumber', 30);
		    $table->string('term', 35)->default(null);
		
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
        Schema::dropIfExists('pre_enroll');
    }
}
