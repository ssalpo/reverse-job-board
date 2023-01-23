<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'website' => 'required|string|min:3',
            'bio' => 'required|string|min:3',
            'avatar' => ($this->isMethod('put') ? 'nullable' : 'required') . '|image|mimes:jpeg,jpg,png|max:2048',
            'personal_name' => 'required|min:3|max:255',
            'job_title' => 'required|min:3|max:255',
        ];
    }
}
