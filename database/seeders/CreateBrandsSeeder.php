<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class CreateBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = [
            [
                'name' => 'AMD',
                'description' => 'Perusahaan AMD',
            ],
            [
                'name' => 'Intel',
                'description' => 'Perusahaan Intel', 
            ]
        ];

        foreach ($brand as $key => $value) {
            Brand::create($value);
        }
    }
}
