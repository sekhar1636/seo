<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff',function(Blueprint $table){
            $table->string('photo_path',70)->nullable()->after('status');
            $table->string('photo_url',150)->nullable()->after('photo_path');
            $table->string('precrop_path',70)->nullable()->after('photo_url');
            $table->string('precrop_url',150)->nullable()->after('precrop_path');
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
