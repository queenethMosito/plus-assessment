<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => $this->filled('password') ? 'required|string|min:8' : '', 
            'confirm_password' => $this->filled('password') ? 'required|string|same:password' : '', 
            'roles' => 'array', 
            'roles.*' => 'exists:roles,id',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'email.required' => 'The email address field is required.',
            'email.email' => 'The email address must be a valid email.',
            'email.unique' => 'The email address is already in use.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.same' => 'The password and confirm password must match.',
            'roles.array' => 'The roles must be an array.',
            'roles.*.exists' => 'One or more selected roles do not exist.',
        ];
    }
}