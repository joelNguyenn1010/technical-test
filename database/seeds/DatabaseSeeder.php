<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        create 10 random user and role
        for($i = 0; $i <= 10; $i++) {
                $role = \App\Roles::create(["name" => Str::random(10)]);

                \App\Users::create(
                    [
                        "name" => Str::random(10),
                        "email" => Str::random(10) . "@gmail.com",
                        "role_id" => $role->id
                    ]
                );
        }
        // $this->call(UsersTableSeeder::class);
    }
}
