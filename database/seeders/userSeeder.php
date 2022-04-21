<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $value){
            DB::table('users')->insert([
                ['name' => Str::random(10),'email' => Str::random(10).'@gmail.com','password' => bcrypt('12345678'),
                    'gender' => rand(1,2),'birthday' => '2022-01-02', 'tel' => $faker->phoneNumber,
                    'address' => $faker->address,'roleId' => rand(1,5)]
            ]);
        }

    }
}
