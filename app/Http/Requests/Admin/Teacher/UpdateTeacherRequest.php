<?php

namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Access the user ID directly from the route parameters
        $teacher = $this->route('user'); // Use 'user' instead of 'users'

        return [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$teacher->id}", // Exclude current teacher's email
            'password' => 'nullable|string|min:8|confirmed', // Password is optional for update
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:9999', // Add rules for avatar
        ];
    }
}
