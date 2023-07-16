<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RectangleTest extends TestCase
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
            ->assertInvalid('base', 'height');
    }

    public function testCreateRectangleWithValidRequestBody()
    {
        $response = $this->post('/api/rectangles', [
            'base' => 5,
            'height' => 3,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'base' => 5,
                'height' => 3,
            ]);
    }
}
