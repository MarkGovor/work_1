<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateBockMark extends FormRequest
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
        return [
            'favicon' => 'mimes:png,jpg,icon|max:2048',
            'url' => 'required|url|unique:book_marks',
            'title' => 'required|max:255',
            'meta_keywords' => 'required:255',
            'meta_description' => 'required:255',
       ];
    }
}
