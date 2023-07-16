<?php

namespace App\Models;

use App\Interfaces\PolygonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triangle extends Model implements PolygonInterface
{
    use HasFactory;
    protected $table = 'triangles';

    protected $fillable = ['base', 'side1', 'side2'];

    function calculateArea(): float
    {
        $perimeterHalf = ($this->base + $this->side1 + $this->side2) / 2;
        $area = sqrt($perimeterHalf * ($perimeterHalf - $this->base) * ($perimeterHalf - $this->side1) * ($perimeterHalf - $this->side2));
        return $area;
    }
}
