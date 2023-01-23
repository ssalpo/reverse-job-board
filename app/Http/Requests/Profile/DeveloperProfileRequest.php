<?php

namespace App\Http\Requests\Profile;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DeveloperProfileRequest extends FormRequest
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
        $experienceLevelKeys = implode(',', array_keys(config('system.experience_levels')));
        $searchStatus = implode(',', array_keys(config('system.search_statuses')));

        return [
            'full_name' => 'required|string|min:3|max:255',
            'hero' => 'required|string|min:3|max:255',
            'avatar' => ($this->isMethod('put') ? 'nullable' : 'required') . '|image|mimes:jpeg,jpg,png|max:2048',
            'city' => 'required',
            'bio' => 'required|string|min:10',
            'search_status' => 'required|numeric|in:' . $searchStatus,
            'experience_level' => 'required|numeric|in:' . $experienceLevelKeys,
            'start_date' => 'required|date:Y-m-d',
            'website' => 'nullable|min:3|max:600',
            'github' => 'nullable|min:3|max:600',
            'vkontakte' => 'nullable|min:3|max:600',
            'twitter' => 'nullable|min:3|max:600',
            'linkedin' => 'nullable|min:3|max:600',
            'stackoverflow' => 'nullable|min:3|max:600',
        ];
    }

//    protected function prepareForValidation()
//    {
//        return $this->merge([
//            'start_date' => Carbon::createFromFormat('d.m.Y', $this->start_date)->format('Y-m-d')
//        ]);
//    }
}
