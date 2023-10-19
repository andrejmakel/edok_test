<?php

namespace App\Http\Requests;

use App\Models\Status;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'nullable',
            ],
            'status_icon' => [
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
