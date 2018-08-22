<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->string('transaction_id', 300);
            $table->integer('product_id')->unsigned()->nullable()->default(null);
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('SET NULL');
            $table->integer('membership_period_id')->unsigned()->nullable()->default(null);
            $table->foreign('membership_period_id')
                  ->references('id')->on('membership_periods')
                  ->onDelete('SET NULL');
            $table->float('price')->unsigned();
            $table->integer('varient_id');
            $table->enum('status', ['0', '1']);
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
