<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRatingRequest extends FormRequest
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
            'work_quality' => 'numeric|between:0,5',
            'task_completion' => 'numeric|between:0,5',
            'over_and_abroad' => 'numeric|between:0,5',
            'communication' => 'numeric|between:0,5'
        ];
    }
}
