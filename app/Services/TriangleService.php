<?php

namespace App\Services;

use App\Dtos\TriangleDto\CreateTriangleDto;
use App\Models\Triangle;
use Exception;

class TriangleService
{
    public function create(CreateTriangleDto $dto): Triangle
    {
        try {

            //logica

            $triangle = Triangle::create([
                'base' => $dto->base,
                'side1' => $dto->side1,
                'side2' => $dto->side2,
            ]);
            return $triangle;
        } catch (Exception $e) {
            throw new Exception('Error to generate new triangle: ' . $e->getMessage());
        }
    }
}
