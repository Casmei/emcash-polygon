<?php

namespace App\Http\Controllers;

use App\Dtos\TriangleDto\CreateTriangleDto;
use App\Http\Requests\Triangle\CreateTriangleRequest;
use App\Services\TriangleService;
use Exception;

class TriangleController extends Controller
{

    private $triangleService;

    public function __construct(TriangleService $triangleService)
    {
        $this->triangleService = $triangleService;
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
     *                          property="side1",
     *                          type="number"
     *                      ),
     *                      @OA\Property(
     *                          property="side2",
     *                          type="number"
     *                      ),
     *                 ),
     *                 example={
     *                     "base": 5,
     *                     "side1": 5,
     *                     "side2": 5
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="base", type="number", example="4"),
     *              @OA\Property(property="side1", type="number", example="5"),
     *              @OA\Property(property="side2", type="number", example="5"),
     *              @OA\Property(property="updated_at", type="string", example="2023-14-07T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2023-14-07T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Error to generate new triangle: Undefined property: App\\Dtos\\TriangleDto\\CreateTriangleDto::$side"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="InvalidArgumentException",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The base field is required. (and 1 more error)"),
     *              @OA\Property(property="errors", type="object",
     *                  @OA\Property(property="base", type="array",
     *                      @OA\Items(type="string", example="The base field is required.")
     *                  ),
     *                  @OA\Property(property="height", type="array",
     *                      @OA\Items(type="string", example="The height field is required.")
     *                  )
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTriangleRequest $request)
    {
        try {
            $rectangle = $this->triangleService->create(
                CreateTriangleDto::makeFromRequest($request)
            );

            return response()->json($rectangle, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
