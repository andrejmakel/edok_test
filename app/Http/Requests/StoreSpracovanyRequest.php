<?php

namespace App\Http\Requests;

use App\Models\Spracovany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSpracovanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('spracovany_create');
    }

    public function rules()
    {
        return [
            'popis' => [
                'string',
                'nullable',
            ],
            'popis_de' => [
                'string',
                'nullable',
            ],
            'popis_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
