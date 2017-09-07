<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStaticPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_page',function (Blueprint $blueprint){

            $blueprint->increments('id');
            $blueprint->string('slug');
            $blueprint->string('page_title')->nullable();
            $blueprint->longText('page_description')->nullable();
            $blueprint->tinyInteger('status');
            $blueprint->timestamps();
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
