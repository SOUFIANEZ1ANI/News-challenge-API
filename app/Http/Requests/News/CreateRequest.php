<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:10000'],
            'start_date' => ['required', 'date'],
            'expiration_date' => ['required', 'date', 'after_or_equal:start_date'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
