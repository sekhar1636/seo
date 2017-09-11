<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTheaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theaters',function(Blueprint $table){
            $table->string('photo_path',70)->nullable();
            $table->string('photo_url',150)->nullable();
            $table->string('precrop_path',70)->nullable();
            $table->string('precrop_url',150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
