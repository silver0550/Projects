<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:projects'],
            'description' => ['required', 'string'],
            'status' => ['required', Rule::in(StatusEnum::getValues())],
        ];
    }
}
