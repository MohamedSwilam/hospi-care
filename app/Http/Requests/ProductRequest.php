<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'overview_en' => 'required',
                'overview_fr' => 'required',
                'description_en' => 'required',
                'description_fr' => 'required',
                'category_id' => 'required|exists:categories,id',
                'details.*.*' => 'required',
                'photos.*' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'title_en' => '',
                'title_fr' => '',
                'overview_en' => '',
                'overview_fr' => '',
                'description_en' => '',
                'description_fr' => '',
                'category_id' => 'exists:categories,id',
            ];
        }
        return [];
    }
}
