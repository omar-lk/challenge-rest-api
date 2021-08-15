<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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

            'content' => 'required',
            'group_id' => 'required',
            'user_id' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'A content is required',
            'group_id.required' => 'A group_id is required',
            'user_id.required' => 'A group_id is required',
        ];
    }
}
