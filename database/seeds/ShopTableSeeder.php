<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'user_id' => 1,
            'name' => 'Jatin Parlour',
            'description' => ""
        ]);
    }
}
