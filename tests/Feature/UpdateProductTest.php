<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_product()
    {
        $product = Product::factory()->create();

        $response = $this->put('/products/'.$product->id, [
            'name' => 'Producto actualizado',
            'price' => 199.99,
            'category_id' => 2,
            'description' => 'Descripción actualizada del producto',
            'state_id' => 2,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Producto actualizado',
            'price' => 199.99,
            'category_id' => 2,
            'description' => 'Descripción actualizada del producto',
            'state_id' => 2,
        ]);
    }
    
}
