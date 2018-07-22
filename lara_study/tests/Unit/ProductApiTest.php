<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    /**
     * Category Api Ok test
     *
     * @return void
     */
    public function testProductApiOk()
    {

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('GET', '/api/products', []);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200
            ]);
    }
}
