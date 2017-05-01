<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id')->unsinged();
            $table->integer('property_type_id')->unsigned()->index();
            $table->foreign('property_type_id')->references('id')->on('property_types');
            $table->integer('listing_id')->unsigned()->index();
            $table->foreign('listing_id')->references('id')->on('property_types');
            $table->string('value');
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
        Schema::dropIfExists('properties');
    }
}
