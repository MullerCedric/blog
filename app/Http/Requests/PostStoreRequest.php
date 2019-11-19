<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required',
            'published_at_date' => 'nullable|date|date_format:Y-m-d',
            'published_at_time' => 'nullable|date_format:H\:i',
            'content' => 'required|min:4'
        ];
    }
}
