<?php

namespace App\Http\Requests;

use App\Models\DokTyp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDokTypRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dok_typ_edit');
    }

    public function rules()
    {
        return [
            'dok_typ_sk' => [
                'string',
                'nullable',
            ],
            'dok_typ_de' => [
                'string',
                'nullable',
            ],
            'dok_typ_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
