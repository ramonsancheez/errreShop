<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
            'name' => 'Bicicletas',
            ],
            [
                'name' => 'Electrónica',
            ],
            [
                'name' => 'Hogar',
            ],
            [
                'name' => 'Juguetes',
            ],
            [
                'name' => 'Libros',
            ],
            [
                'name' => 'Moda',
            ],
            [
                'name' => 'Música',
            ],
            [
                'name' => 'Videojuegos',
            ],
            [
                'name' => 'Otros',
            ]
        ]);
    }
}
