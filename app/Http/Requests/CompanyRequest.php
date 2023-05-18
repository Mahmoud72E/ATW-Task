<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:companies,name,' . $this->id,
            'email' => 'nullable|email',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'logo' => [
                'required',
                Rule::dimensions()->maxWidth(100)->maxHeight(100),
            ],

            'website' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.email' => 'Please enter a valid email address.',
            'logo.image' => 'The logo must be an image file.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.max' => 'The logo may not be greater than 2MB.',
            'logo.dimensions' => 'The logo must have a minimum dimension of 100x100 pixels.',
            'website.url' => 'Please enter a valid website URL.',
        ];
    }
}
