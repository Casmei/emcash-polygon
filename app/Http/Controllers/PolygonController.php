<?php

namespace App\Http\Controllers;

use App\Dtos\CreatePolygonDto;
use App\Http\Requests\CreatePolygonRequest;
use App\Services\PolygonService;
use Illuminate\Routing\Controller;

class PolygonController extends Controller
{
    protected $polygonService;

    public function __construct(PolygonService $polygonService)
    {
        $this->polygonService = $polygonService;
    }

    /**
     * Returns the value of the sum of the areas of all registered polygons.
     * @OA\Get (
     *     path="/api/total-area",
     *     tags={"Area"},
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="total_area", type="number", example=20),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function calculateTotalArea()
    {
        $totalArea = $this->polygonService->calculateTotalArea();

        return response()->json(['total_area' => $totalArea]);
    }
}
