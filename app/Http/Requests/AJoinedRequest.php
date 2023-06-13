<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AJoinedRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'lastname' => 'required|string|max:250',
            'age' => 'required|numeric',
            'work_study_direction' => 'string|max:250',
            'work_study_name' => 'string|max:250',
            'why_want' => 'required|string'
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'name.required' => 'The name field is required.',
    //         'name.string' => 'The name field must be a string.',
    //         'name.max' => 'The name field may not be greater than 250 characters.',
    //         'lastname.required' => 'The lastname field is required.',
    //         'lastname.string' => 'The lastname field must be a string.',
    //         'lastname.max' => 'The lastname field may not be greater than 250 characters.',
    //         'age.required' => 'The age field is required.',
    //         'age.numeric' => 'The age field must be a numeric value.',
    //         'proffessions_step_1_top_level=1.required' => 'The proffessions_step_1_top_level=1 field is required.',
    //         'proffessions_step_1_top_level=2.required' => 'The proffessions_step_1_top_level=2 field is required.',
    //         'work_study_direction.string' => 'The work_study_direction field must be a string.',
    //         'work_study_direction.max' => 'The work_study_direction field may not be greater than 250 characters.',
    //         'work_study_name.string' => 'The work_study_name field must be a string.',
    //         'work_study_name.max' => 'The work_study_name field may not be greater than 250 characters.',
    //         'why_want.required' => 'The why_want field is required.',
    //         'why_want.string' => 'The why_want field must be a string.',
    //     ];
    // }
}
