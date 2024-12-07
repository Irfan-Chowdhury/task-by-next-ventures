<?php

namespace App\Http\Requests\User;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    use FailedValidation;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'. $this->id,
            'address' => 'required|string',
            'password' => 'min:5|confirmed',
            'role_names' => 'required|array',
            'role_names.*' => 'string|exists:roles,name',        ];
    }
}
