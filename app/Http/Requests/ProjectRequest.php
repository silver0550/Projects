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
            'contact' => ['nullable', 'array'],
            'contact.method' => ['required_if:contact,!=,null', Rule::in('set', 'create', 'update')],
            'contact.id' => ['required_if:contact.method,==,set'],
            'contact.name' => ['required_if:contact.method,!=,set', 'string', 'max:255', 'unique:contacts'],
            'contact.email' => ['required_if:contact.method,!=,set', 'email', 'unique:contacts'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('project.name'),
            'description' => __('project.description'),
            'status' => __('project.status'),
            'contact.method' => __('global.method'),
            'contact.id' => __('contact.id'),
            'contact.name' => __('contact.name'),
            'contact.email' => __('contact.email'),
        ];
    }
}
