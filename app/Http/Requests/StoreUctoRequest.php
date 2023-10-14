<?php

namespace App\Http\Requests;

use App\Models\Ucto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUctoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ucto_create');
    }

    public function rules()
    {
        return [
            'uctuje' => [
                'string',
                'nullable',
            ],
            'tel' => [
                'string',
                'nullable',
            ],
            'mobil' => [
                'string',
                'nullable',
            ],
        ];
    }
}
