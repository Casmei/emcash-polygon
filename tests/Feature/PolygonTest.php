<?php

namespace Tests\Feature;

use App\Models\Polygon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PolygonTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateRectangle()
    {
        $response = $this->post('/api/rectangles', [
            'base' => 5,
            'height' => 3,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'type' => 'rectangle',
                'base' => 5,
                'height' => 3,
            ]);
    }

    public function testCreateTriangle()
    {
        $response = $this->post('/api/triangles', [
            'base' => 4,
            'height' => 2,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'type' => 'triangle',
                'base' => 4,
                'height' => 2,
            ]);
    }

    public function testCalculateTotalArea()
    {
        Polygon::factory()->create([
            'type' => 'rectangle',
            'base' => 5,
            'height' => 3,
        ]);

        Polygon::factory()->create([
            'type' => 'triangle',
            'base' => 4,
            'height' => 2,
        ]);

        $response = $this->get('/api/total-area');

        $response->assertStatus(200)
            ->assertJson([
                'total_area' => 17,
            ]);
    }
}
