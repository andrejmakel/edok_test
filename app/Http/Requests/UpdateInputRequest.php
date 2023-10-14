<?php

namespace App\Http\Requests;

use App\Models\Input;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInputRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_edit');
    }

    public function rules()
    {
        return [
            'zadal' => [
                'string',
                'nullable',
            ],
        ];
    }
}
