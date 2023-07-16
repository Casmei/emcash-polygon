<?php

namespace Tests\Unit\Services;

use App\Dtos\CreatePolygonDto;
use App\Dtos\TriangleDto\CreateTriangleDto;
use App\Models\Rectangle;
use App\Models\Triangle;
use App\Services\PolygonService;
use App\Services\TriangleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TriangleServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateTriangle()
    {
        $dto = new CreateTriangleDto(5, 5, 5);

        $service = new TriangleService();

        $triangle = $service->create($dto);

        $this->assertInstanceOf(Triangle::class, $triangle);
        $this->assertEquals(5, $triangle->base);
        $this->assertEquals(5, $triangle->side1);
        $this->assertEquals(5, $triangle->side2);
    }

    public function testCalculateArea()
    {
        $triangle = Triangle::create([
            'base' => 6,
            'side1' => 8,
            'side2' => 10,
        ]);

        $expectedArea = 24;

        $this->assertEquals($expectedArea, $triangle->calculateArea());
    }

    public function testInvalidTriangle()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid triangle. The sides do not satisfy the triangle inequality.');

        $dto = new CreateTriangleDto(5, 10, 20);
        $service = new TriangleService();

        $service->create($dto);
    }
}
