<?php

namespace App\Http\Requests\Role;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    use FailedValidationTrait;

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:roles,name',
        ];
    }
}
