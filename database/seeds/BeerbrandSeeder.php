<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BeerbrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beerbrands')->insert([

            'beerbrand'=>'standaard',
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // DB::table('beerbrands')->insert([

        //     'beerbrand'=>'grolsch',
        //     'single_can_price'=>1.00,
        //     'single_small_bottle_price'=>2.00,
        //     'single_large_bottle_price'=>3.00,
        //     'sixpack_can_price'=>4.00,
        //     'sixpack_bottle_price'=>5.00,
        //     'beercase_price'=>6.00,
        // ]);


        // DB::table('beerbrands')->insert([

        //     'beerbrand'=>'heineken',
        //     'single_can_price'=>1.00,
        //     'single_small_bottle_price'=>2.00,
        //     'single_large_bottle_price'=>3.00,
        //     'sixpack_can_price'=>4.00,
        //     'sixpack_bottle_price'=>5.00,
        //     'beercase_price'=>6.00,
        // ]);





    }
}

