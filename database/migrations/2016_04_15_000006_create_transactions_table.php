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
            $table->boolean('billing')->default(0);
            $table->boolean('reiterate')->default(0);
            $table->boolean('exception')->default(0);
            $table->integer('user_id')->nullable()->index();
            $table->integer('category_id')->nullable()->index();
            $table->integer('provider_id')->nullable()->index();
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
