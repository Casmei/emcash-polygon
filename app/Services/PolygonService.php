<?php

namespace App\Services;

use App\Models\Rectangle;
use App\Models\Triangle;

class PolygonService
{
    public function calculateTotalArea(): float
    {
        $rectangles = Rectangle::all();
        $triangles = Triangle::all();
        $polygons = $rectangles->concat($triangles);
        $totalArea = 0;

        foreach ($polygons as $polygon) {
            $totalArea += $polygon->calculateArea();
        }

        return $totalArea;
    }
}
