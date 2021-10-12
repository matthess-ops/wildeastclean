<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // titel boek of muziek etc
            $table->longText('description');// boek omschrijving
            $table->longText('blurb')->nullable(); // set to null because it isnt needed for now
            $table->longText('passage'); // probably only used for books, this is an example text for a book
            $table->float('price'); // price
            $table->string('main_image'); // this is the image shown on the index page
            $table->json('carousel_images')->nullable(); // all carousel images, book will have an empty array
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
        Schema::dropIfExists('books');

    }
}
