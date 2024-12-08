<?php

namespace App\Http\Requests\Auth;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use FailedValidationTrait;

    public function rules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required',
        ];
    }
}
