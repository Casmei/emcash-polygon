<?php

namespace App\Models;

use App\Interfaces\PolygonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectangle extends Model implements PolygonInterface
{
    use HasFactory;
    protected $table = 'rectangles';

    protected $fillable = ['base', 'height'];

    function calculateArea(): float
    {
        return $this->base * $this->height;
    }
}
