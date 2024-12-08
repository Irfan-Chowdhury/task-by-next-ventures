<?php

namespace App\Http\Requests\Role;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoleUpdateRequest extends FormRequest
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

        parent::FailedValidationTrait($validator);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:roles,name,'.$this->id,
        ];
    }
}
