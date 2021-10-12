<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userID'); //userId is used to link user data with order etc
            $table->string('email'); 
            $table->string('firstname'); 
            $table->string('lastname'); 
            $table->string('streetname'); 
            $table->string('streetnumber'); 
            $table->string('cityname'); 
            $table->string('postcode'); 
            $table->string('phonenumber');
            $table->json('orders')->nullable();
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
        Schema::dropIfExists('user_data');

    }
}
