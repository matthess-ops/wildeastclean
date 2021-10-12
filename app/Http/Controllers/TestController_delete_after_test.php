<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kratmeister;
use App\Beerbrand;

class TestController extends Controller
{
    public function testcarousel(){

        return view('test.testcarousel', ['kratmeister' => Kratmeister::find(1),'beerbrands' => Beerbrand::orderBy('created_at', 'DESC')->get()]);
    }
}
