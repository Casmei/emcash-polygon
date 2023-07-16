<?php

namespace Tests\Unit\Services;

use App\Dtos\CreatePolygonDto;
use App\Models\Rectangle;
use App\Models\Triangle;
use App\Services\PolygonService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PolygonServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculateTotalAreaWithNoPolygons()
    {
        $service = new PolygonService();
        $totalArea = $service->calculateTotalArea();

        $this->assertEquals(0, $totalArea);
    }

    public function testCalculateTotalAreaWithPolygons()
    {
        Rectangle::create([
            'base' => 5,
            'height' => 5,
        ])->save();

        Triangle::create([
            'base' => 6,
            'side1' => 8,
            'side2' => 10,
        ])->save();

        $expectedTotalArea = 49;

        $service = new PolygonService();
        $totalArea = $service->calculateTotalArea();

        $this->assertEquals($expectedTotalArea, $totalArea);
    }
}
