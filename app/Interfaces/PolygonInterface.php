<?php

namespace App\Interfaces;

interface PolygonInterface {
    /**
     * Calculate the area of the polygon.
     *
     * @return float
     */
    public function calculateArea(): float;

    /**
     * Create a new polygon instance.
     *
     * @param array $attributes
     * @return self
     */
    public static function create(array $attributes): self;

    /**
     * Validate if the polygon is valid.
     * This method should be implemented as private in the concrete classes.
     *
     * @return bool
     */
    // public function isValid(): bool;
}
