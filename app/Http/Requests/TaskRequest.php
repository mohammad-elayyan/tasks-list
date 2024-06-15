<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'long_description' => 'min:3',
            'completed' => ''
        ];
    }
}
