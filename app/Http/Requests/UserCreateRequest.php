<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // User Data Validated Request
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
        ];
    }



    public function messages(): array{

        return [
            'name.required' => 'The name field is required.',
            'name.string'   => 'The name must be a valid string.',
            'name.max'      => 'The name may not be greater than 255 characters.',

            'email.required' => 'The email field is required.',
            'email.email'    => 'Please provide a valid email address.',
            'email.exists'   => 'This email does not exist in our system.',
            'email.max'      => 'The email may not be greater than 255 characters.',

            'password.required' => 'The password field is required.',
            'password.string'   => 'The password must be a valid string.',
            'password.min'      => 'The password must be at least 6 characters.',

        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
