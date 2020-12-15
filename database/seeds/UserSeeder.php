<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('users')->insert([
          'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345678910'),
            'Address'=>'Jl Tebet Barat',
            'Phone-Number'=>bcrypt('082111992322'),
            'Gender'=>'Male'

        ]);
    }
}
