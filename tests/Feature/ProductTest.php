<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * Test getAllProducts method.
     * @return void
     */
    public function test_get_all_products(): void
    {
        Product::factory()->count(10)->create();
        $response = $this->get('api/v1/products');
        $response->assertStatus(200);
    }

    /**
     * Test getProductByCode method.
     * @return void
     */
    public function test_get_product_by_code(): void
    {
        $product = Product::factory()->create();
        $response = $this->get('api/v1/products/' . $product->code);
        $response->assertStatus(200);
    }

    /**
     * Test updateProduct method.
     * @return void
     */
    public function test_update_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->put('api/v1/products/' . $product->code, [
            'status' => 'published',
        ]);
        $response->assertStatus(200);
    }

    /**
     * Test deleteProduct method.
     * @return void
     */
    public function test_delete_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->delete('api/v1/products/' . $product->code);
        $response->assertStatus(200);
    }
}
