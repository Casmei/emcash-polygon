<?php

namespace App\Services;

use App\Enums\PolygonType;
use App\Models\Polygon;

class PolygonService
{
    public function createRectangle($base, $height)
    {
        return Polygon::create([
            'type' => PolygonType::RECTANGLE,
            'base' => $base,
            'height' => $height,
        ]);
    }

    public function createTriangle($base, $height)
    {
        return Polygon::create([
            'type' => PolygonType::TRIANGLE,
            'base' => $base,
            'height' => $height,
        ]);
    }

    public function calculateTotalArea()
    {
        $polygons = Polygon::all();
        $totalArea = 0;

        foreach ($polygons as $polygon) {
            $totalArea += $this->calculateArea($polygon);
        }

        return $totalArea;
    }

    private function calculateArea($polygon)
    {
        if ($polygon->type === 'rectangle') {
            return $polygon->base * $polygon->height;
        } elseif ($polygon->type === 'triangle') {
            return 0.5 * $polygon->base * $polygon->height;
        }

        return 0;
    }
}
