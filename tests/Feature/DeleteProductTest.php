<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete('/products/'.$product->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_delete_product_with_invalid_id()
    {
        $response = $this->delete('/products/invalid_id');

        $response->assertStatus(404);
    }

}
