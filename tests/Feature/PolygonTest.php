<?php

namespace Tests\Feature;

use App\Models\Polygon;
use App\Models\Rectangle;
use App\Models\Triangle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PolygonTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculateTotalArea()
    {
        Rectangle::create([
            'base' => 4,
            'height' => 5,
        ])->save();

        Triangle::create([
            'base' => 5,
            'side1' => 5,
            'side2' => 5,
        ])->save();

        $response = $this->get('/api/total-area');

        $response->assertStatus(200)
            ->assertJson([
                'total_area' => 30.825,
            ]);
    }

    public function testCalculateTotalAreaZero()
    {

        $response = $this->get('/api/total-area');

        $response->assertStatus(200)
            ->assertJson([
                'total_area' => 0,
            ]);
    }
}
