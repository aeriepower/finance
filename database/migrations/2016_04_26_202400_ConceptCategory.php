<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConceptCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('concept_category', function (Blueprint $table) {
            $table->primary('concept');
            $table->integer('category_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
