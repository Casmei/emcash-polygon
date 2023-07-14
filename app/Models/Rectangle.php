<?php

namespace App\Models;

use App\Enums\PolygonType;

class Rectangle extends Polygon
{

    //model booting
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rectangle) {
            $rectangle->type = PolygonType::RECTANGLE;
        });
    }

    public function calculateArea()
    {
        return $this->base * $this->height;
    }
}
