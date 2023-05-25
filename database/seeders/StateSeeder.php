<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::insert([
            [
                'name' => 'Nuevo',
            ],
            [
                'name' => 'Muy bueno',
            ],
            [
                'name' => 'Bueno',
            ],
            [
                'name' => 'Usado',
            ],
            [
                'name' => 'Malo',
            ],
            [
                'name' => 'Lo ha dado todo',
            ]
        ]);
    }
}
