<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert(
            [
                '1' => [
                    'name' => 'Product 1',
                    'description' => 'Product 1 Description',
                    'price' => rand(1, 100)
                ],
                '2' => [
                    'name' => 'Product 2',
                    'description' => 'Product 2 Description',
                    'price' => rand(1, 100)
                ],
                '3' => [
                    'name' => 'Product 3',
                    'description' => 'Product 3 Description',
                    'price' => rand(1, 100)
                ],
                '4' => [
                    'name' => 'Product 4',
                    'description' => 'Product 4 Description',
                    'price' => rand(1, 100)
                ],
                '5' => [
                    'name' => 'Product 5',
                    'description' => 'Product 5 Description',
                    'price' => rand(1, 100)
                ],
                '6' => [
                    'name' => 'Product 6',
                    'description' => 'Product 6 Description',
                    'price' => rand(1, 100)
                ],
                '7' => [
                    'name' => 'Product 7',
                    'description' => 'Product 7 Description',
                    'price' => rand(1, 100)
                ]
            ]
        );
    }
}
