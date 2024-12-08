<?php

namespace App\Http\Requests\User;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    use FailedValidationTrait;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string',
            'password' => 'required|min:5|confirmed',
            'role_names' => 'required|array',
            'role_names.*' => 'string|exists:roles,name',
        ];
    }
}
