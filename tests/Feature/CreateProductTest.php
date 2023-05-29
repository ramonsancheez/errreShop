<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $response = $this->post('/products', [
            'name' => 'test porducto',
            'price' => 1,
            'user_id' => 0,
            'category_id' => 1,
            'description' => 'Descripción del producto',
            'state_id' => 1,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['name' => 'Nuevo producto']);
    }

    public function test_create_product_with_invalid_price()
    {
        $response = $this->post('/products', [
            'name' => 'test porducto',
            'price' => 'invalid price',
            'user_id' => 0,
            'category_id' => 1,
            'description' => 'Descripción del producto',
            'state_id' => 1,
        ]);

        $response->assertStatus(422);
    }

    public function test_create_product_with_invalid_category()
    {
        $response = $this->post('/products', [
            'name' => 'test porducto',
            'price' => 1,
            'user_id' => 0,
            'category_id' => 'invalid category',
            'description' => 'Descripción del producto',
            'state_id' => 1,
        ]);

        $response->assertStatus(422);
    }

    public function test_create_product_with_invalid_state()
    {
        $response = $this->post('/products', [
            'name' => 'test porducto',
            'price' => 1,
            'user_id' => 0,
            'category_id' => 1,
            'description' => 'Descripción del producto',
            'state_id' => 'invalid state',
        ]);

        $response->assertStatus(422);
    }

    public function test_create_product_with_invalid_name()
    {
        $response = $this->post('/products', [
            'name' => 1,
            'price' => 1,
            'user_id' => 0,
            'category_id' => 1,
            'description' => 'Descripción del producto',
            'state_id' => 1,
        ]);

        $response->assertStatus(422);
    }

    public function test_create_product_with_invalid_description()
    {
        $response = $this->post('/products', [
            'name' => 'test porducto',
            'price' => 1,
            'user_id' => 0,
            'category_id' => 1,
            'description' => 1,
            'state_id' => 1,
        ]);

        $response->assertStatus(422);
    }

    public function test_create_product_with_invalid_data()
    {
        $response = $this->post('/products', [
            'name' => 1,
            'price' => 'invalid price',
            'user_id' => 0,
            'category_id' => 'invalid category',
            'description' => 1,
            'state_id' => 'invalid state',
        ]);

        $response->assertStatus(422);
    }
}
