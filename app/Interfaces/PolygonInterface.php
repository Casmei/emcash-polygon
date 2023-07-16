<?php

namespace App\Interfaces;

interface PolygonInterface {
    function calculateArea(): float;
    function isValid(): bool;
    static function create(array $attributes): self;
}
