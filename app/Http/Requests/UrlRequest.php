<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
            'original_url' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'original_url.required' => 'Original url field is required',
            'original_url.url'      => 'Original url must be a valid url'
        ];
    }
}
