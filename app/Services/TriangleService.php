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
            $triangle = Triangle::create([
                'base' => $dto->base,
                'side1' => $dto->side1,
                'side2' => $dto->side2,
            ]);

            $triangle->save();

            return $triangle;
        } catch (Exception $e) {
            throw new Exception('Error to generate new triangle: ' . $e->getMessage());
        }
    }
}
