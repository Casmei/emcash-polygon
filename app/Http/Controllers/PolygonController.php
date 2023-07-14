<?php

namespace App\Http\Controllers;

use App\Services\PolygonService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PolygonController extends Controller
{
    protected $polygonService;

    public function __construct(PolygonService $polygonService)
    {
        $this->polygonService = $polygonService;
    }

    public function createRectangle(Request $request)
    {
        $base = $request->input('base');
        $height = $request->input('height');

        $rectangle = $this->polygonService->createRectangle($base, $height);

        return response()->json($rectangle, 201);
    }

    public function createTriangle(Request $request)
    {
        $base = $request->input('base');
        $height = $request->input('height');

        $triangle = $this->polygonService->createTriangle($base, $height);

        return response()->json($triangle, 201);
    }

    public function calculateTotalArea()
    {
        $totalArea = $this->polygonService->calculateTotalArea();

        return response()->json(['total_area' => $totalArea]);
    }
}
