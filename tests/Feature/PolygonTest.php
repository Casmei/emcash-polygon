<?php

namespace Tests\Feature;

use App\Models\Polygon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PolygonTest extends TestCase
{
    use RefreshDatabase;


    public function testCreateRectangleWithInvalidBase()
    {
        $response = $this->postJson('/api/rectangles', [
            'base' => 'invalid',
            'height' => 3,
        ]);

        $response->assertStatus(422)
            ->assertInvalid('base');
    }

    public function testCreateRectangleWithInvalidHeight()
    {
        $response = $this->postJson('/api/rectangles', [
            'base' => 1,
            'height' => 'invalid',
        ]);

        $response->assertStatus(422)
            ->assertInvalid('height');
    }

    public function testCreateRectangleWithInvalidBody()
    {
        $response = $this->postJson('/api/rectangles', [
            'base' => 'invalid',
            'height' => 'invalid',
        ]);

        $response->assertStatus(422)
            ->assertInvalid('base','height');
    }

        public function testCreateTriangleWithInvalidBase()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 'invalid',
            'height' => 3,
        ]);

        $response->assertStatus(422)
            ->assertInvalid('base');
    }

    public function testCreateTriangleWithInvalidHeight()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 1,
            'height' => 'invalid',
        ]);

        $response->assertStatus(422)
            ->assertInvalid('height');
    }

    public function testCreateTriangleWithInvalidBody()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 'invalid',
            'height' => 'invalid',
        ]);

        $response->assertStatus(422)
            ->assertInvalid('base','height');
    }

    public function testCreateRectangleWithValidRequestBody()
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

    public function testCreateTriangleWithValidRequestBody()
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
        Polygon::create([
            'type' => 'rectangle',
            'base' => 5,
            'height' => 3,
        ]);

        Polygon::create([
            'type' => 'triangle',
            'base' => 4,
            'height' => 2,
        ]);

        $response = $this->get('/api/total-area');

        $response->assertStatus(200)
            ->assertJson([
                'total_area' => 19,
            ]);
    }
}
