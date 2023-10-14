<?php

namespace App\Http\Requests;

use App\Models\Typ;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typ_create');
    }

    public function rules()
    {
        return [
            'typ_sk' => [
                'string',
                'nullable',
            ],
            'typ_de' => [
                'string',
                'nullable',
            ],
            'typ_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
