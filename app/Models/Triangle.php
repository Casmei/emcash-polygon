<?php

namespace App\Models;

use App\Enums\PolygonType;

class Triangle extends Polygon
{

    //model booting
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($triangle) {
            $triangle->type = PolygonType::TRIANGLE;
        });
    }

    public function calculateArea()
    {
        return 0.5 * $this->base * $this->height;
    }
}
