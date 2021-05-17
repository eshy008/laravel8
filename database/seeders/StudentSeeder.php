<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("students")->insert([
            "name" => $faker->name(),
            "email" => $faker->safeEmail,
            "mobile" => $faker->phoneNumber,
            "age" => $faker->numberBetween(25, 35),
            "gender" => $faker->randomElement(["male", 
            "female", 
            "others"
            ]),
            "address_info" => $faker->address

        ]);
    }
}
