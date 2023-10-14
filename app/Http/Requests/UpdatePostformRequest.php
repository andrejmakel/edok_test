<?php

namespace App\Http\Requests;

use App\Models\Postform;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostformRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('postform_edit');
    }

    public function rules()
    {
        return [
            'postform_sk' => [
                'string',
                'nullable',
            ],
            'postform_icon' => [
                'string',
                'nullable',
            ],
        ];
    }
}
