<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class update_profile_post extends FormRequest
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
            'bio' => 'string|nullable',
            'birthday_day' => 'numeric',
            'birthday_month' => 'numeric',
            'birthday_year' => 'numeric',
        ];
    }
}
