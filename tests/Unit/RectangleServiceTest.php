<?php

namespace Tests\Unit\Services;

use App\Dtos\CreatePolygonDto;
use App\Dtos\RectangleDto\CreateRectangleDto;
use App\Dtos\TriangleDto\CreateTriangleDto;
use App\Models\Rectangle;
use App\Models\Triangle;
use App\Services\PolygonService;
use App\Services\RectangleService;
use App\Services\TriangleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RectangleServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateRectangle()
    {
        $dto = new CreateRectangleDto(5, 5);

        $service = new RectangleService();

        $rectangle = $service->create($dto);

        $this->assertInstanceOf(Rectangle::class, $rectangle);
        $this->assertEquals(5, $rectangle->base);
        $this->assertEquals(5, $rectangle->height);
    }

    public function testCalculateArea()
    {
        $rectangle = Rectangle::create([
            'base' => 5,
            'height' => 5,
        ]);

        $expectedArea = 25;

        $this->assertEquals($expectedArea, $rectangle->calculateArea());
    }

    public function testInvalidRectangle()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid rectangle.');

        $dto = new CreateRectangleDto(5, -5);
        $service = new RectangleService();

        $service->create($dto);
    }
}
