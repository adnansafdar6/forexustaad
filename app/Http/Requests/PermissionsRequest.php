<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
            'name' => 'required',
            'guard_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name Field is required.',
            'guard_name.required'=>'Select Guard Name.',
        ];
    }
}
