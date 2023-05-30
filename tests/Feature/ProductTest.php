<?php
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    /**
     * Test listing all products.
     *
     * @return void
     */
    public function testListingProducts()
    {
        $user = User::factory()->create();
        $products = Product::factory()->count(3)->create();

        $response = $this->actingAs($user)->getJson('/api/v1/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                 [
                        'id',
                        'name',
                        'description',
                        'price',
                        'created_at',
                        'updated_at',
                    ]

            ]);

        $response->assertJson($products->toArray());
    }

    /**
     * Test creating a new product.
     *
     * @return void
     */
    public function testCreatingProduct()
    {
        $user = User::factory()->create();
        $productData = [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 19.99,
        ];

        $response = $this->actingAs($user)->postJson('/api/v1/products', $productData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'price',
                'created_at',
                'updated_at',
            ]);

        $this->assertDatabaseHas('products', $productData);
    }

     /**
     * Test retrieving a specific product.
     *
     * @return void
     */
    public function testRetrieveProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/v1/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ]);
    }


     /**
     * Test updating a product.
     *
     * @return void
     */
    public function testUpdateProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $updatedData = [
            'name' => 'Updated Product',
            'description' => 'This product has been updated.',
            'price' => 19.99,
        ];

        $response = $this->actingAs($user)->putJson('/api/v1/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $updatedData['name'],
                'description' => $updatedData['description'],
                'price' => 'R$ 19,99',
                'created_at' => $product->created_at,
                'updated_at' => $product->fresh()->updated_at,
            ]);

        $this->assertDatabaseHas('products', $updatedData);
    }

    /**
     * Test deleting a product.
     *
     * @return void
     */
    public function testDeleteProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->deleteJson('/api/v1/products/' . $product->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
