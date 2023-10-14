<?php

namespace App\Http\Requests;

use App\Models\Nasa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNasaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nasa_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'konto' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ],
            'swift' => [
                'string',
                'nullable',
            ],
        ];
    }
}
