<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Processor',
                'description' => 'Otak komputer',
            ],
            [
                'name' => 'VGA',
                'description' => 'Untuk kebutuhan grafis',
            ],
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
