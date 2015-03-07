<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersAndCandidatesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name')->default('');
            $table->text('symbol')->default('');
			$table->timestamps();
		});

        Schema::create('voters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('candidates_id')->unsigned()->default(0);
            $table->foreign('candidates_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->string('name')->default('');
            $table->boolean('cast')->default(false);
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
        Schema::drop('candidates');
		Schema::drop('voters');
	}

}
