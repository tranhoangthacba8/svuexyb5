<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class positionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Developer, Brse, Comtor, Tester, PM, Other
        DB::table('positions')->insert([
            ['type' => 'Developer'],
            ['type' => 'Brse'],
            ['type' => 'Tester'],
            ['type' => 'PM'],
            ['type' => 'Other']
        ]);
    }
}
