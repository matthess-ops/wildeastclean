<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeerbrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beerbrands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('beerbrand');
            $table->float('single_can_price')->default(0); // all carousel images, book will have an empty array
            $table->float('single_small_bottle_price')->default(0);; // all carousel images, book will have an empty array
            $table->float('single_large_bottle_price')->default(0);; // all carousel images, book will have an empty array
            $table->float('sixpack_can_price')->default(0);; // all carousel images, book will have an empty array
            $table->float('sixpack_bottle_price')->default(0);; // all carousel images, book will have an empty array
            $table->float('beercase_price')->default(0);; // all carousel images, book will have an empty arra   
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
        Schema::dropIfExists('beerbrands');
    }
}
