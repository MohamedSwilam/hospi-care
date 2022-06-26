<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
                'name' => 'required',
                'slug' => 'required|unique:sites,slug',
                'about' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'location_description' => 'required',
                'location_url' => 'required',
                'photo' => 'required|max:51200|mimes:jpeg,png,jpg',
                'catalog' => 'required|max:51200',
            ];
        }
        else if (sizeof($segments) == 3){
            return [
                'name' => '',
                'slug' => '',
                'about' => '',
                'phone' => '',
                'email' => 'email',
                'location_description' => '',
                'location_url' => '',
                'photo' => 'max:51200|mimes:jpeg,png,jpg',
                'catalog' => 'max:51200',
            ];
        }
        return [];
    }
}
