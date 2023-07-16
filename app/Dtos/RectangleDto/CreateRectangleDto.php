<?php

namespace App\Dtos\RectangleDto;

use App\Http\Requests\Rectangle\CreateRectangleRequest;

class CreateRectangleDto
{
    public function __construct(
        public float $base,
        public float $height,
    ) {}

    public static function makeFromRequest(CreateRectangleRequest $request): self
    {
        return new self(
            $request->base,
            $request->height
        );
    }
}
