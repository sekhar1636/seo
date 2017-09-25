<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableForTheaterRegistrationNow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theaters',function(Blueprint $table){
           $table->string('contact_number')->after('email')->nullable();
           $table->string('website')->after('contact_number')->nullable();
           $table->tinyInteger('non_musical_yes')->after('website')->nullable();
           $table->tinyInteger('non_musical_no')->after('non_musical_yes')->nullable();
           $table->tinyInteger('non_musical_not_certain')->after('non_musical_no')->nullable();
           $table->tinyInteger('dancers_yes')->after('non_musical_not_certain')->nullable();
           $table->tinyInteger('dancers_no')->after('dancers_yes')->nullable();
           $table->tinyInteger('dancers_not_certain')->after('dancers_no')->nullable();
           $table->tinyInteger('friday')->after('dancers_not_certain')->nullable();
           $table->tinyInteger('saturday')->after('friday')->nullable();
           $table->tinyInteger('sunday')->after('saturday')->nullable();
           $table->string('name_table_1')->after('sunday')->nullable();
           $table->string('title_table_1')->after('name_table_1')->nullable();
           $table->string('name_table_2')->after('title_table_1')->nullable();
           $table->string('title_table_2')->after('name_table_2')->nullable();
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
