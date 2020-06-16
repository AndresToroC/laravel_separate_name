<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'names' => 'required|max:255'
        ];
    }
}
