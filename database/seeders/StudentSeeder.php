<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
         foreach(range(1,10) as $value){
            DB::table('students')->insert([
                'name' => $faker->name(),
                'city' => $faker->city(),
                'fees' => $faker->randomFloat(2),
            ]);
         }
    }
}
