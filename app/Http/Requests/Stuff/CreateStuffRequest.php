<?php

namespace App\Http\Requests\Stuff;

use Illuminate\Foundation\Http\FormRequest;

class CreateStuffRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'price' => intval(str_replace(',', '', $this->price))
        ]);
    }
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
            'code' => 'required|unique:stuffs',
            'name' => 'required|string|unique:stuffs',
            'price' => 'required|numeric|digits_between:0,9',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
