<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['name' => 'New York'],
            ['name' => 'California'],
            ['name' => 'Illinois'],
            ['name' => 'Texas'],
            ['name' => 'Arizona'],
            ['name' => 'Pennsylvania'],
            ['name' => 'Florida'],
            ['name' => 'Ohio'],
            ['name' => 'Michigan'],
            ['name' => 'Georgia'],
            // Add more states here...
        ]);
    }
}
