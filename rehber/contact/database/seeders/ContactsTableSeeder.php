<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('contacts')->insert([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'description' => $faker->text(20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

