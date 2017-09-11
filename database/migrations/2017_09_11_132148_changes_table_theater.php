<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesTableTheater extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theaters', function(Blueprint $table)
        {
            $table->dropColumn('photo_path');
            $table->dropColumn('photo_url');
            $table->dropColumn('precrop_path');
            $table->dropColumn('precrop_url');
        });

        Schema::table('theaters', function(Blueprint $table)
        {
            $table->string('photo_path',70)->nullable()->after('status');
            $table->string('photo_url',150)->nullable()->after('photo_path');

            $table->string('precrop_path',70)->nullable()->after('photo_url');
            $table->string('precrop_url',150)->nullable()->after('precrop_path');

            $table->string('resume_path',70)->nullable()->after('precrop_url');

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
