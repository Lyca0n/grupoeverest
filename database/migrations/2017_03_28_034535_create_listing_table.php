<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id')->unsinged();
            $table->string('name');
            $table->decimal('price',10,2);
            $table->decimal('squaremeters',10,2);
            $table->decimal('buildsquaremeters',10,2);
            $table->integer('number');
            $table->string('street');
            $table->string('neighbourhood');
            $table->text('description');
            $table->string('zipcode');
            $table->integer('operation_type_id')->unsigned()->index();
            $table->foreign('operation_type_id')->references('id')->on('operation_types');
            $table->integer('listing_type_id')->unsigned()->index();
            $table->foreign('listing_type_id')->references('id')->on('listing_types');
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('listings');
    }
}
