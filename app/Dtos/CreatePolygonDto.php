<?php

namespace App\Dtos;

use App\Http\Requests\CreatePolygonRequest;
use Illuminate\Http\Request;


class CreatePolygonDto
{
    public function __construct(
        public float $base,
        public float $height,
    ) {}

    public static function makeFromRequest(CreatePolygonRequest $request): self
    {
        return new self(
            $request->base,
            $request->height
        );
    }
}
