<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|min:5|max:255',
            'description' => 'required|max:255',
            'type' => 'required|numeric',
            'status' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after_or_equal:start_date',
            'assignee' => 'required|numeric',
            'estimate' => 'required|numeric',
            'actual' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            /* 'required' => ':attribute bắt buộc nhập',
            'min' => ':attribute phải nhập ít nhất :min kí tự',
            'max' => ':attribute có số kí tự tối đa :max' */];
    }
}
