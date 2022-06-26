<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                'details_en' => 'required',
                'details_fr' => 'required',
                'site_id' => 'required|exists:sites,id',
                'photo' => 'required|max:51200|mimes:jpeg,png,jpg',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'title_en' => '',
                'title_fr' => '',
                'details_en' => '',
                'details_fr' => '',
                'site_id' => 'exists:sites,id',
                'photo' => 'max:51200|mimes:jpeg,png,jpg',
            ];
        }
        return [];
    }
}
