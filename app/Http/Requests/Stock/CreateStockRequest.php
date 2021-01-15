<?php

namespace App\Http\Requests\Stock;

use App\Services\StuffService;

use Illuminate\Foundation\Http\FormRequest;

class CreateStockRequest extends FormRequest
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
        $rules = [
            'stuff_id' => 'required|exists:stuffs,id',
            'type' => 'required|in:masuk,keluar',
            'total' => 'required|integer'
        ];

        if ($this->type === 'keluar') {
            $stock = $stuff->getStock($this->stuff_id);

            $rules = array_merge($rules, [
                'total' => 'required|integer|max:'.$stock
            ]);
        }

        return $rules;
    }
}
