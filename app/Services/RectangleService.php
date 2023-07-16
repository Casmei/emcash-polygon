<?php

namespace App\Services;

use App\Dtos\RectangleDto\CreateRectangleDto;
use App\Models\Rectangle;
use Exception;

class RectangleService
{
    public function create(CreateRectangleDto $data)
    {
        try {
            $rectangle = Rectangle::create([
                'base' => $data->base,
                'height' => $data->height
            ]);

            $rectangle->save();

            return $rectangle;
        } catch (Exception $e) {
            throw new Exception('Error to generate new rectangle: ' . $e->getMessage());
        }
    }
}
