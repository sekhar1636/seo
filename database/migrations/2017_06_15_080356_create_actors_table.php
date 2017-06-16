<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 40);
            $table->integer('age');
            $table->string('gender', 7);
            $table->string('height', 4);
            $table->string('hair', 20);
            $table->string('eyes', 20);
            $table->integer('weight');
            $table->string('school', 150);
            $table->string('auditionType', 30);
            $table->string('vocalRange', 30);
            $table->string('jobType');
            $table->string('dance');
            $table->string('technical');
            $table->string('ethnicity');
            $table->string('instrument');
            $table->string('misc');
            $table->string('photo_path',70)->nullable();
            $table->string('photo_url',150)->nullable();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('actors');
    }
}
