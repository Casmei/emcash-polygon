<?php

namespace App\Http\Requests\Triangle;

use Illuminate\Foundation\Http\FormRequest;

class CreateTriangleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'base' => 'required|numeric',
            'side1' => 'required|numeric',
            'side2' => 'required|numeric',
        ];
    }
}
