<?php

namespace App\Http\Requests;

use App\Models\DokKat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDokKatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dok_kat_create');
    }

    public function rules()
    {
        return [
            'dok_kat' => [
                'string',
                'nullable',
            ],
        ];
    }
}
