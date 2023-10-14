<?php

namespace App\Http\Requests;

use App\Models\Ucto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUctoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ucto_edit');
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
