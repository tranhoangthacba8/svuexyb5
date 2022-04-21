<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class reportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,15) as $value){
            DB::table('reports')->insert([
               ['workingType' => rand(1,4), 'workingTime' => rand(1,8),'projectId' => rand(1,5),
                   'detail' => Str::random(50),'date' => '2022-01-03','userId' => rand(1,20),
                   'positionId' => rand(1,5)]
            ]);
        }

    }
}
