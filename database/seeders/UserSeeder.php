<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Container::getInstance()->make(Generator::class);
        $data = [];

        for($i=0; $i<200; $i++) {

            for($v=0; $v<500; $v++) {
                $data[] = [
                    'name' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'role' => 'user',
                    'password' => bcrypt('password'),
                ];

            }

            $chunks = array_chunk($data, 50);
            foreach ($chunks as $chunk) {
                User::query()->insert($chunk);
            }
        }

    }
}
