<?php

namespace App\Models;

use App\Interfaces\PolygonInterface;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectangle extends Model implements PolygonInterface
{
    use HasFactory;
    protected $table = 'rectangles';

    protected $fillable = ['base', 'height'];

    public function calculateArea(): float
    {
        return $this->base * $this->height;
    }

    public function isValid(): bool
    {
        return ($this->base > 0) && ($this->height > 0);
    }

    public static function create(array $attributes): Rectangle
    {
        $rectangle = new Rectangle($attributes);

        if (!$rectangle->isValid()) {
            throw new Exception('Invalid rectangle.');
        }

        return $rectangle;
    }
}
