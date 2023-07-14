<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{
    use HasFactory;
    protected $table = 'polygons';

    protected $fillable = ['base', 'height', 'type'];
}
