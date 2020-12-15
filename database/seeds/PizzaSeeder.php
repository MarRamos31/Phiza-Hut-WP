<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('pizza')->insert([
            'Pizza_name' => 'Pizza ABC',
            'Pizza_desc'=>'Pizza Bernuansa ABC',
            'Pizza_price'=> 10000,
            'Pizza_photo'=> 'harrislogonew.png'

        ]);
        \Illuminate\Support\Facades\DB::table('pizza')->insert([
            'Pizza_name' => 'Pizza Makaroni',
            'Pizza_desc'=>'Pizza Bernuansa Makaroni',
            'Pizza_price'=> 10000,
            'Pizza_photo'=> 'kepiting-4.png'

        ]);
    }
}
