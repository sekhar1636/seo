<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableStaffForLatestUpdateDropdowns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff',function(Blueprint $table){
           $table->date('from')->nullable()->after('email');
           $table->date('to')->nullable()->after('from');
           $table->integer('primary_sought')->nullable()->after('to');
           $table->integer('secondary_sought')->nullable()->after('primary_sought');
           $table->string('age_twenty_one')->nullable()->after('secondary_sought');
           $table->tinyInteger('accompanist')->nullable()->after('age_twenty_one');
           $table->tinyInteger('administration')->nullable()->after('accompanist');
           $table->tinyInteger('box_office')->nullable()->after('administration');
           $table->tinyInteger('carpentry')->nullable()->after('box_office');
           $table->tinyInteger('choreography')->nullable()->after('carpentry');
           $table->tinyInteger('costume_design')->nullable()->after('choreography');
           $table->tinyInteger('sewing')->nullable()->after('costume_design');
           $table->tinyInteger('technical_director')->nullable()->after('sewing');
           $table->tinyInteger('graphics')->nullable()->after('technical_director');
           $table->tinyInteger('house_management')->nullable()->after('graphics');
           $table->tinyInteger('lighting_design')->nullable()->after('house_management');
           $table->tinyInteger('electrics')->nullable()->after('lighting_design');
           $table->tinyInteger('director')->nullable()->after('electrics');
           $table->tinyInteger('musical_director')->nullable()->after('director');
           $table->tinyInteger('photography')->nullable()->after('musical_director');
           $table->tinyInteger('video')->nullable()->after('photography');
           $table->tinyInteger('props')->nullable()->after('video');
           $table->tinyInteger('publicity')->nullable()->after('props');
           $table->tinyInteger('running_crew')->nullable()->after('publicity');
           $table->tinyInteger('scenic_artist')->nullable()->after('running_crew');
           $table->tinyInteger('set_design')->nullable()->after('scenic_artist');
           $table->tinyInteger('sound')->nullable()->after('set_design');
           $table->tinyInteger('state_management')->nullable()->after('sound');
           $table->tinyInteger('company_management')->nullable()->after('state_management');

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
