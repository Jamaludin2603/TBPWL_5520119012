<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRolesSeeder::class);
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateCategoriesSeeder::class);
        $this->call(CreateBrandsSeeder::class);
    }
}
