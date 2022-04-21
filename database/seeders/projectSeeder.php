<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,5) as $value){
            DB::table('projects')->insert([
               ['name' => Str::random(10),'detail' => Str::random(50),'revenue' => 10000000]
            ]);
        }
    }
}
