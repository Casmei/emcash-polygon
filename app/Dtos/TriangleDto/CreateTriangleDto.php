<?php

namespace App\Dtos\TriangleDto;

use App\Http\Requests\Triangle\CreateTriangleRequest;

class CreateTriangleDto
{
    public function __construct(
        public float $base,
        public float $side1,
        public float $side2
    ) {}

    public static function makeFromRequest(CreateTriangleRequest $request): self
    {
        return new self(
            $request->base,
            $request->side1,
            $request->side2
        );
    }
}
