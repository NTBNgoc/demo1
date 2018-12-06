<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'Banh pizza Hai San',
            'description' => 'Banh sieu ngon',
            'information' => 'hihi banh nhan ngon, vo day dan',
            'price' => '120000',
            'size' => 'M',
        ]);
    }
}
