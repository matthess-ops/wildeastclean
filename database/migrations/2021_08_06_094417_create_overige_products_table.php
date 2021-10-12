<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverigeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overige_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // titel boek of muziek etc
            $table->longText('description');
            $table->string('main_image'); // this is the image shown on the index page
            $table->json('carousel_images'); // all carousel images, book will have an empty array
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
        Schema::dropIfExists('overige_products');

    }
}
