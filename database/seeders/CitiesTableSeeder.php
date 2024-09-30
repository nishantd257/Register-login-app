<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'New York', 'state_id' => 1],
            ['name' => 'Los Angeles', 'state_id' => 2],
            ['name' => 'Chicago', 'state_id' => 3],
            ['name' => 'Houston', 'state_id' => 4],
            ['name' => 'Phoenix', 'state_id' => 5],
            ['name' => 'Philadelphia', 'state_id' => 6],
            ['name' => 'San Antonio', 'state_id' => 4],
            ['name' => 'San Diego', 'state_id' => 2],
            ['name' => 'Dallas', 'state_id' => 4],
            ['name' => 'San Jose', 'state_id' => 2],
            // Add more cities here for each state...
        ]);
    }
}
