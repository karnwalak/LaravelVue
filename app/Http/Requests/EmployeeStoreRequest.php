<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'birthday' => ['required'],
            'department' => ['required','not_in:0'],
            'country_name' => ['required'],
            'state_name' => ['required'],
            'city_name' => ['required'],
            'zipcode' => ['required','digits:6','integer'],
            'date_hired' => ['required'],
            'address' => ['required'],
        ];
    }
}
