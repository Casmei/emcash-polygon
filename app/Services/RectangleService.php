<?php

namespace App\Services;

use App\Dtos\RectangleDto\CreateRectangleDto;
use App\Models\Rectangle;
use Exception;

class RectangleService
{
    public function create(CreateRectangleDto $dto): Rectangle
    {
        try {
            $rectangle = Rectangle::create([
                'base' => $dto->base,
                'height' => $dto->height
            ]);
            return $rectangle;
        } catch (Exception $e) {
            throw new Exception('Error to generate new rectangle: ' . $e->getMessage());
        }
    }
}
