<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableForActorDirChoreo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors_role',function (Blueprint $table){
           $table->increments('id');
           $table->longText('show')->nullable();
           $table->longText('theater')->nullable();
           $table->longText('dir_chor')->nullable();
           $table->longText('roles_chosen')->nullable();
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
        //
    }
}
