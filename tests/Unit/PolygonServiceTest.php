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

    public function testCreateRectangle()
    {
        $dto = new CreatePolygonDto(5,3);

        $service = new PolygonService();

        $rectangle = $service->createRectangle($dto);

        $this->assertInstanceOf(Rectangle::class, $rectangle);
        $this->assertEquals(5, $rectangle->base);
        $this->assertEquals(3, $rectangle->height);
    }

    public function testCreateTriangle()
    {
        $dto = new CreatePolygonDto(4,2);

        $service = new PolygonService();
        $triangle = $service->createTriangle($dto);

        $this->assertInstanceOf(Triangle::class, $triangle);
        $this->assertEquals(4, $triangle->base);
        $this->assertEquals(2, $triangle->height);
    }

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
            'height' => 3,
        ]);

        Triangle::create([
            'base' => 4,
            'height' => 2,
        ]);

        $service = new PolygonService();
        $totalArea = $service->calculateTotalArea();

        $this->assertEquals(19, $totalArea);
    }
}
