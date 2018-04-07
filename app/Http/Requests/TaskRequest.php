<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
            'title'         => 'required|string',
            'description'   => 'required|string',
            'user_id'       => 'nullable',
            'type'          => ['required', Rule::in(array_keys(config('enums.tasks.types')))],
            'status'        => ['nullable', Rule::in(array_keys(config('enums.tasks.statuses')))],
            'importance'    => ['nullable', Rule::in(array_keys(config('enums.tasks.importance')))],
            'date_to'       => 'nullable'
        ];
    }
}
