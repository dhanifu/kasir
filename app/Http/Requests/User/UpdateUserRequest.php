<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:users',
            'name' => 'required|string|unique:users,name,'.$this->id,
            'email' => 'required|email|unique:users,email,'.$this->id,
            'role' => 'required|in:admin,kasir',
            'file' => 'image'
        ];
    }
}
