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
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 20)->nullable();
            $table->integer('age')->nullable();
            $table->string('gender', 7)->nullable();
            $table->integer('feet')->nullable();
            $table->integer('inch')->nullable();
            $table->string('hair', 20)->nullable();
            $table->string('eyes', 20)->nullable();
            $table->integer('weight')->nullable();
            $table->string('school', 150)->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('auditionType', 30)->nullable();
            $table->string('vocalRange', 30)->nullable();
            $table->string('jobType')->nullable();
            $table->string('dance')->nullable();
            $table->string('technical')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('instrument')->nullable();
            $table->string('misc')->nullable();
            $table->string('photo_path',70)->nullable();
            $table->string('photo_url',150)->nullable();

            $table->string('precrop_path',70)->nullable();
            $table->string('precrop_url',150)->nullable();

            $table->string('resume_path',70)->nullable();

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
