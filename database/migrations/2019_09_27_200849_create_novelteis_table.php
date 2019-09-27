<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelteisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->integer('user_id')->unsigned();
            $table->boolean('status');

            $table->timestamps();
        });

        Schema::create('ambients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 180);
            $table->string('codigo', 20);
            $table->string('description');
            $table->integer('area_id')->unsigned();
            $table->boolean('status');
            
            $table->foreign('area_id')->references('id')->on('areas');
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('description');
            $table->timestamps();
        });


        Schema::create('novelteis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('ambient_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('status');
            $table->string('description');


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ambient_id')->references('id')->on('ambients');
            $table->foreign('type_id')->references('id')->on('types');


            $table->rememberToken();
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
        Schema::dropIfExists('areas');
        Schema::dropIfExists('ambients');
        Schema::dropIfExists('types');
        Schema::dropIfExists('novelteis');
    }
}
