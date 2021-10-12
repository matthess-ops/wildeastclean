<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('streetname');
            $table->string('housenumber');

            $table->string('postcode');
            $table->string('city');
            $table->string('phonenumber');
            $table->string('email');

            $table->longText('book_orders')->nullable(); // all carousel images, book will have an empty array
            $table->longText('kratmeister_orders')->nullable(); // all carousel images, book will have an empty array
            $table->string('paymentStatus')->default("ordered");
            $table->string('mollie_id')->nullable(); // all carousel images, book will have an empty array
            $table->string('total_order_price')->nullable(); // all carousel images, book will have an empty array


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
        Schema::dropIfExists('orders');
    }
}


