<?php

namespace App\Services;

use App\Enums\PolygonType;
use App\Models\Polygon;
use App\Models\Rectangle;
use App\Models\Triangle;

class PolygonService
{
    public function createRectangle($base, $height)
    {
        return Rectangle::create([
            'base' => $base,
            'height' => $height,
        ]);
    }

    public function createTriangle($base, $height)
    {
        return Triangle::create([
            'base' => $base,
            'height' => $height,
        ]);
    }

    public function calculateTotalArea()
    {
        $polygons = Polygon::all();
        $totalArea = 0;

        foreach ($polygons as $polygon) {
            $polygonInstance = $this->createPolygonInstance($polygon);
            if ($polygonInstance) {
                $totalArea += $polygonInstance->calculateArea();
            }
        }

        return $totalArea;
    }

    private function createPolygonInstance(Polygon $polygon)
    {
        $polygonData = [
            'base' => $polygon->base,
            'height' => $polygon->height,
        ];

        switch ($polygon->type) {
            case PolygonType::RECTANGLE:
                return new Rectangle($polygonData);
            case PolygonType::TRIANGLE:
                return new Triangle($polygonData);
            default:
                return null;
        }
    }
}
