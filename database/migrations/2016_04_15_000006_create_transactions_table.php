<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concept');
            $table->string('data')->nullable();
            $table->integer('amount');
            $table->integer('account_balance');
            $table->dateTime('datetime');
            $table->boolean('billing')->comment = "Boolean 1 if is billig or 0 if not";
            $table->boolean('recurrence')->nullable()->comment = "Bollean 1 if is recurring event";
            $table->boolean('exception')->nullable()->comment = "Boolean 1 if don't want to show at analytics";
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('user_id')->references('id')->on('user');
            //$table->foreign('category_id')->references('id')->on('category');
            //$table->foreign('provider_id')->references('id')->on('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
