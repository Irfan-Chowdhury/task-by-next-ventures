<?php

namespace App\Http\Requests\Role;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PermissionAssignRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function FailedValidationTrait(Validator $validator)
    {
        if ($this->is('api/*') || $this->expectsJson()) {
            throw new HttpResponseException(
                response()->json(['errors' => $validator->errors()], 422)
            );
        }

        parent::FailedValidationTrait($validator);  // Use the default behavior for non-API requests
    }

    public function rules(): array
    {
        return [
            'role_name' => 'required|string|exists:roles,name',
            'permission_names' => 'required|array',
            'permission_names.*' => 'string|exists:permissions,name',
        ];
    }
}
