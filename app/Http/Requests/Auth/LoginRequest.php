<?php

namespace App\Http\Requests\Auth;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use FailedValidation;
    
    public function rules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required',
        ];
    }
}
