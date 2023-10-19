<?php

namespace App\Http\Requests;

use App\Models\Postform;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostformRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('postform_create');
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
            'title_de' => [
                'string',
                'nullable',
            ],
            'title_sk' => [
                'string',
                'nullable',
            ],
            'title_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
