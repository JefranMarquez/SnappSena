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
        Schema::create('rols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description');
            $table->timestamps();

        });

        Schema::create('occupations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('description');
            $table->timestamps();

        });

        Schema::create('headquarters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();

        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('telephone', 10);
            $table->string('email', 190)->unique();
            $table->string('birthdate');
            $table->string('password', 80);
            $table->integer('rol_id')->unsigned();
            $table->boolean('status');
            $table->integer('occupation_id')->unsigned();
            $table->integer('headquarter_id')->unsigned();

            
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->foreign('headquarter_id')->references('id')->on('headquarters');


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
        Schema::dropIfExists('rols');
        Schema::dropIfExists('occupations');
        Schema::dropIfExists('headquarters');
        Schema::dropIfExists('users');
    }
}
