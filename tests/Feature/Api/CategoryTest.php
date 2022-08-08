<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $endpoint = '/api/categories';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_categories()
    {
        Category::factory()->count(6)->create();

        $response = $this->getJson($this->endpoint);

        $response->assertJsonCount(6, 'data');
        $response->assertStatus(200);
    }

    public function test_get_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("{$this->endpoint}/{$category->id}");

        $response->assertStatus(200);
    }

    public function test_validations_store_category()
    {
        $response = $this->postJson($this->endpoint, [
            'title'       => '',
            'description' => ''
        ]);

        $response->assertStatus(422);
    }

    public function test_store_category()
    {
        $response = $this->postJson($this->endpoint, [
            'title'       => 'category 01',
            'description' => 'description of category'
        ]);

        $response->assertStatus(201);
    }
}
