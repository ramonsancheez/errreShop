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
        $product = factory(Product::class)->create();

        $response = $this->delete(route('product.destroy', $product->id));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_delete_product_with_invalid_id()
    {
        $response = $this->delete('/products/invalid_id');

        $response->assertStatus(404);
    }

}
