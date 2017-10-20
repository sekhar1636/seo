<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CheckboxForTheaterField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theaters',function(Blueprint $table){
           $table->integer('accompanist')->after('sunday')->nullable();
           $table->integer('administration')->after('accompanist')->nullable();
           $table->integer('box_office')->after('administration')->nullable();
           $table->integer('carpentry')->after('sunday')->nullable();
           $table->integer('choreographer')->after('carpentry')->nullable();
           $table->integer('costume_design')->after('choreographer')->nullable();
           $table->integer('director')->after('costume_design')->nullable();
           $table->integer('electrics')->after('director')->nullable();
           $table->integer('graphics')->after('sunday')->nullable();
           $table->integer('house')->after('sunday')->nullable();
           $table->integer('light_ops')->after('sunday')->nullable();
           $table->integer('makeup_wig_design')->after('sunday')->nullable();
           $table->integer('music_director')->after('sunday')->nullable();
           $table->integer('paint_charge')->after('music_director')->nullable();
           $table->integer('photography')->after('paint_charge')->nullable();
           $table->integer('pit_musician')->after('photography')->nullable();
           $table->integer('properties')->after('pit_musician')->nullable();
           $table->integer('publicity')->after('properties')->nullable();
           $table->integer('scenic_artist')->after('publicity')->nullable();
           $table->integer('set_design')->after('scenic_artist')->nullable();
           $table->integer('sewing_wardrobe')->after('set_design')->nullable();
           $table->integer('sound')->after('sewing_wardrobe')->nullable();
           $table->integer('state_management')->after('sound')->nullable();
           $table->integer('technical_direction')->after('state_management')->nullable();
           $table->integer('video')->after('technical_direction')->nullable();
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
