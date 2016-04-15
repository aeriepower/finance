<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_es');
            $table->string('name_en');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->integer('parent_location_id');
            $table->integer('geo_category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('parent_location_id')->references('id')->on('geo_location');
            $table->foreign('geo_category_id')->references('id')->on('geo_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('geo_locations');
    }
}
