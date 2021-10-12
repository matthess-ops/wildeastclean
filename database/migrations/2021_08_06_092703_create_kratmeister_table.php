<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKratmeisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kratmeisters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title'); // titel boek of muziek etc
            $table->longText('back_label_text');
            // $table->longText('back_label_text_test') ->nullable();

            $table->text('front_label_image'); // this is the image shown on the index page
            $table->json('carousel_images'); // all carousel images, book will have an empty array
            $table->float('single_can_price'); // all carousel images, book will have an empty array
            $table->float('single_small_bottle_price'); // all carousel images, book will have an empty array
            $table->float('single_large_bottle_price'); // all carousel images, book will have an empty array
            $table->float('sixpack_can_price'); // all carousel images, book will have an empty array
            $table->float('sixpack_bottle_price'); // all carousel images, book will have an empty array
            $table->float('beercase_price'); // all carousel images, book will have an empty arra

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
        Schema::dropIfExists('kratmeisters');

    }
}
