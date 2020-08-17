<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
     * Set additional request before validate
     *
     */
    protected function prepareForValidation()
    {
        if ($this->method() === 'POST') {
            $this->merge(['status' => 0]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $statusValid = join(',', array_keys(config('task.status')));
        $rules = [
            'task' => 'required|max:255',
            'note' => 'required',
            'status' => 'required|in:'.$statusValid
        ];
        if ($this->method() === 'POST') {
            $rules['do_at'] = 'required|date';
        }
        return $rules;
    }
}
