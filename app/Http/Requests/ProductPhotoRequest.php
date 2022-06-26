<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPhotoRequest extends FormRequest
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
                'product_id' => 'required|exists:products,id',
                'photos.*' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'product_id' => 'required|exists:products,id',
                'photos' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        return [];
    }
}
