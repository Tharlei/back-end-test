<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testAll()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $response = $this->post('/api/products', [
            'name' => 'Test',
            'sku' => 1,
            'weight' => '20',
            'height' => '20',
            'width' => '20',
            'length' => '20',
            'price' => '20'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testShow()
    {
        $this->post('/api/products', [
            'name' => 'Test',
            'sku' => 1,
            'weight' => '20',
            'height' => '20',
            'width' => '20',
            'length' => '20',
            'price' => '20'
        ]);

        $response = $this->get("/api/products/1");

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testValidatorUniqueSku()
    {
        $sku = '1';

        $this->post('/api/products', [
            'name' => 'Test',
            'sku' => $sku,
            'weight' => '20',
            'height' => '20',
            'width' => '20',
            'length' => '20',
            'price' => '20'
        ]);

        $response = $this->post('/api/products', [
            'name' => 'Test',
            'sku' => $sku,
            'weight' => '20',
            'height' => '20',
            'width' => '20',
            'length' => '20',
            'price' => '20'
        ]);

        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function testValidatorRequiredInputs()
    {
        $response = $this->post('/api/products', [
            'name' => 'Test',
            'sku' => '1'
        ]);

        $response->assertStatus(422);
    }
}
