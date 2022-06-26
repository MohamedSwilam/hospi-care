<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name_en' => 'required',
                'name_fr' => 'required',
                'site_id' => 'required|exists:sites,id',
                'photo' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'name_en' => '',
                'name_fr' => '',
                'site_id' => 'exists:sites,id',
                'photo' => 'max:51200|mimes:jpeg,png,jpg',
            ];
        }
        return [];
    }
}
