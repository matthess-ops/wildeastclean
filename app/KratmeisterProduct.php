<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KratmeisterProduct extends Model
{
    protected $table = "kratmeister_products";
    protected $casts = [
        'carousel_images'=>'array',

    ];
}
