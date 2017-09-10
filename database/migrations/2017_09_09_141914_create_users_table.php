<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('userid');
		    $table->string('username', 45);
		    $table->string('password', 45);
		    $table->string('name', 45);
		    $table->integer('type');
		    $table->string('email', 45)->default(null);
		    $table->integer('idnumber')->unsigned();
		
		    $table->index('idnumber','id_number_idx');
		
		    $table->foreign('idnumber')
		        ->references('id_number')->on('s')
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
        Schema::dropIfExists('users');
    }
}
