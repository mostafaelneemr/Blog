<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'thumbnail' => 'image|mimes:png,jpg,jpeg', 
            'title' => 'required|unique:posts,title,'. $this->post, 
            'details' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
