<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();
        // Product::insert([
        //     [
        //     'name' => 'Bici',
        //     'description' => 'Bici description',
        //     'price' => 100,
        //     'state' => 'bueno',
        //     'category_id' => '1',
        //     ],
        //     [
        //     'name' => 'Bici2',
        //     'description' => 'Bici2 description',
        //     'price' => 200,
        //     'state' => 'nuevo',
        //     'category_id' => '1',
        //     ],
        //     [
        //     'name' => 'Bici3',
        //     'description' => 'Bici3 description',
        //     'price' => 300,
        //     'state' => 'malo',
        //     'category_id' => '1',
        //     ],
        //     [
        //     'name' => 'Bici4',
        //     'description' => 'Bici description',
        //     'price' => 400,
        //     'state' => 'bueno',
        //     'category_id' => '3',
        //     ],
        //     [
        //     'name' => 'Bici5',
        //     'description' => 'Bici5 description',
        //     'price' => 200,
        //     'state' => 'nuevo',
        //     'category_id' => '7',
        //     ],
        //     [
        //     'name' => 'Bici6',
        //     'description' => 'Bici6 description',
        //     'price' => 300,
        //     'state' => 'malo',
        //     'category_id' => '2',
        //     ]
        // ]);
    }
}
