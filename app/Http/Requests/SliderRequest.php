<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                'main_title_en' => 'required',
                'main_title_fr' => 'required',
                'sub_title_en' => '',
                'sub_title_fr' => '',
                'button_url' => '',
                'site_id' => 'required|exists:sites,id',
                'photo' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'main_title_en' => '',
                'main_title_fr' => '',
                'sub_title_en' => '',
                'sub_title_fr' => '',
                'button_url' => '',
                'site_id' => 'exists:sites,id',
                'photo' => 'max:51200|mimes:jpeg,png,jpg',
            ];
        }
        return [];
    }
}
