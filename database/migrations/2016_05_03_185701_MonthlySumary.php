<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MonthlySumary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_summary', function (Blueprint $table) {
            $table->integer('month')->index();
            $table->integer('year')->index();
            $table->integer('cashOut');
            $table->integer('cashIn');
            $table->integer('user_id')->index();
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('parent_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('monthly_summary');
    }
}
