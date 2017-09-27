<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAlterStaffForNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff',function(Blueprint $table) {

            DB::statement('ALTER TABLE staff MODIFY `user_id` integer(11), MODIFY `email` varchar(255),MODIFY `subscription` int(11), MODIFY `status` tinyint(4)');
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
