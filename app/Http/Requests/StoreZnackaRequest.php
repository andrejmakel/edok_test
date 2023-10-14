<?php

namespace App\Http\Requests;

use App\Models\Znacka;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreZnackaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('znacka_create');
    }

    public function rules()
    {
        return [
            'znacka' => [
                'string',
                'nullable',
            ],
        ];
    }
}
