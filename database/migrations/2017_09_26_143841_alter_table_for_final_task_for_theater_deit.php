<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableForFinalTaskForTheaterDeit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theaters',function (Blueprint $table){
           $table->string('mailing')->after('website')->nullable();
           $table->string('telephone')->after('mailing')->nullable();
           $table->string('fax')->after('telephone')->nullable();
           $table->string('zipcode')->after('fax')->nullable();
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
