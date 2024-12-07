<?php

namespace App\Http\Requests\User;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*') || $this->expectsJson()) {
            throw new HttpResponseException(
                response()->json(['errors' => $validator->errors()], 422)
            );
        }

        parent::failedValidation($validator);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string',
            'password' => 'required|min:5|confirmed',
            'role_name' => 'required|string|exists:roles,name',
        ];
    }
}
