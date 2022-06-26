<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailRequest extends FormRequest
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
        $segments = request()->segments();
        if (sizeof($segments) == 2){
            return [
                'title_en' => 'required',
                'title_fr' => 'required',
                'value_en' => 'required',
                'value_fr' => 'required',
                'product_id' => 'required|exists:products,id',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'title_en' => '',
                'title_fr' => '',
                'value_en' => '',
                'value_fr' => '',
                'product_id' => 'exists:products,id',
            ];
        }
        return [];
    }
}
