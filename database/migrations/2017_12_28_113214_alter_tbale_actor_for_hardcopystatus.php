<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTbaleActorForHardcopystatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actors',function (Blueprint $table){
            DB::statement('ALTER TABLE actors MODIFY `hardcopy_status` tinyint(4), MODIFY `audition_status` tinyint(4),MODIFY `audition_hour` time');
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
