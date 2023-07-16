<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TriangleTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateTriangleWithInvalidBase()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 'invalid',
            'side1' => 5,
            'side1' => 5,
        ]);

        $response->assertStatus(422)
            ->assertInvalid('base');
    }

    public function testCreateTriangleWithInvalidSide1()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 5,
            'side1' => 'invalid',
            'side2' => 5,
        ]);

        $response->assertStatus(422)
            ->assertInvalid('side1');
    }

    public function testCreateTriangleWithInvalidSide2()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 5,
            'side1' => 5,
            'side2' => 'invalid',
        ]);

        $response->assertStatus(422)
            ->assertInvalid('side2');
    }

    public function testCreateTriangleWithIncorrectSides()
    {
        $response = $this->postJson('/api/triangles', [
            'base' => 5,
            'side1' => 2,
            'side2' => 1,
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'error' => "Error to generate new triangle: Invalid triangle. The sides do not satisfy the triangle inequality.",
            ]);
    }
}
