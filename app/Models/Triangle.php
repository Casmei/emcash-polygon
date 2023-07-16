<?php

namespace App\Models;

use App\Interfaces\PolygonInterface;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triangle extends Model implements PolygonInterface
{
    use HasFactory;
    protected $table = 'triangles';

    protected $fillable = ['base', 'side1', 'side2'];

    public function calculateArea(): float
    {
        $perimeterHalf = ($this->base + $this->side1 + $this->side2) / 2;
        $area = sqrt(
            $perimeterHalf *
                ($perimeterHalf - $this->base) *
                ($perimeterHalf - $this->side1) *
                ($perimeterHalf - $this->side2)
        );

        return $area;
    }

    private function isValid(): bool
    {
        $sum1 = $this->base + $this->side1;
        $sum2 = $this->base + $this->side2;
        $sum3 = $this->side1 + $this->side2;

        return ($sum1 > $this->side2) &&
            ($sum2 > $this->side1) &&
            ($sum3 > $this->base);
    }

    public static function create(array $attributes): Triangle
    {
        $triangle = new Triangle($attributes);

        if (!$triangle->isValid()) {
            throw new Exception('Invalid triangle. The sides do not satisfy the triangle inequality.');
        }

        return $triangle;
    }
}
