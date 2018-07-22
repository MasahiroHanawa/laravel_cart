<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryApiTest extends TestCase
{
    /**
     * Category Api Ok test
     *
     * @return void
     */
    public function testCategoryApiOk()
    {

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('GET', '/api/categories', []);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200
            ]);
    }
}
