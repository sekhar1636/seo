<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActorAuditionExtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audition_extra',function(Blueprint $table){
           $table->increments('id');
           $table->integer('user_id')->nullable();
           $table->tinyInteger('last_audition_year')->nullable();
           $table->tinyInteger('last_audition_two')->nullable();
           $table->string('last_year_year')->nullable();
           $table->tinyInteger('audition_last_apply')->nullable();
           $table->tinyInteger('summer_stock_last_year')->nullable();
           $table->string('where_place')->nullable();
           $table->tinyInteger('unpaid_apprentice')->nullable();
           $table->tinyInteger('internship')->nullable();
           $table->tinyInteger('standby_appointment')->nullable();
           $table->tinyInteger('emca')->nullable();
           $table->tinyInteger('sag')->nullable();
           $table->tinyInteger('aftra')->nullable();
           $table->tinyInteger('agva')->nullable();
           $table->tinyInteger('agma')->nullable();
           $table->tinyInteger('friday_m')->nullable();
           $table->tinyInteger('friday_af')->nullable();
           $table->tinyInteger('saturday_m')->nullable();
           $table->tinyInteger('saturday_af')->nullable();
           $table->tinyInteger('sunday_m')->nullable();
           $table->tinyInteger('sunday_af')->nullable();
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
