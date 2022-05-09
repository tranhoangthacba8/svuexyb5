<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class editRequest extends FormRequest
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
            'projectName' => 'required',
            'positionName' => 'required',
            'workingTime' => 'required|numeric',
            'date' => 'required',
            'workingType' => 'required',
            'detail' => 'required'
        ];
    }
}
