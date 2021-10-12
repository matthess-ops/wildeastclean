<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname'); // titel boek of muziek etc
            $table->string('lastname'); // titel boek of muziek etc
            $table->string('streetname'); // this is the image shown on the index page
            $table->string('housenumber'); // this is the image shown on the index page
            $table->string('city'); // this is the image shown on the index page
            $table->string('postcode'); // this is the image shown on the index page
            $table->string('email'); // this is the image shown on the index page
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
        Schema::dropIfExists('customers');

    }
}
