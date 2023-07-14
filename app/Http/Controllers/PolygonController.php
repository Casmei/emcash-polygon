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


    /**
     * Create rectangle polygon
     * @OA\Post (
     *     path="/api/rectangles",
     *     tags={"Rectangle"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="base",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="height",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "base": 4,
     *                     "height": 5
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="base", type="number", example="4"),
     *              @OA\Property(property="height", type="number", example="5"),
     *              @OA\Property(property="type", type="string", example="rectangle"),
     *              @OA\Property(property="updated_at", type="string", example="2023-14-07T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2023-14-07T09:25:53.000000Z"),
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
    public function createRectangle(Request $request)
    {
        $base = $request->input('base');
        $height = $request->input('height');

        $rectangle = $this->polygonService->createRectangle($base, $height);

        return response()->json($rectangle, 201);
    }

    /**
     * Create triangle polygon
     * @OA\Post (
     *     path="/api/triangles",
     *     tags={"Triangle"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="base",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="height",
     *                          type="number"
     *                      )
     *                 ),
     *                 example={
     *                     "base": 4,
     *                     "height": 5
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="base", type="number", example="4"),
     *              @OA\Property(property="height", type="number", example="5"),
     *              @OA\Property(property="type", type="string", example="triangle"),
     *              @OA\Property(property="updated_at", type="string", example="2023-14-07T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2023-14-07T09:25:53.000000Z"),
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
    public function createTriangle(Request $request)
    {
        $base = $request->input('base');
        $height = $request->input('height');

        $triangle = $this->polygonService->createTriangle($base, $height);

        return response()->json($triangle, 201);
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
