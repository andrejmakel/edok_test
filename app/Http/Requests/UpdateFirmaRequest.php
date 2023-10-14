<?php

namespace App\Http\Requests;

use App\Models\Firma;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFirmaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('firma_edit');
    }

    public function rules()
    {
        return [
            'nazov' => [
                'string',
                'nullable',
            ],
            'kontakts.*' => [
                'integer',
            ],
            'kontakts' => [
                'array',
            ],
            'idmmc' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'short_address' => [
                'string',
                'nullable',
            ],
            'ico' => [
                'string',
                'nullable',
            ],
            'dic' => [
                'string',
                'nullable',
            ],
            'ic_dph' => [
                'string',
                'nullable',
            ],
            'ic_dph_form' => [
                'string',
                'nullable',
            ],
            'telefon' => [
                'string',
                'nullable',
            ],
            'sprac_posty' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ],
            'swift_bic' => [
                'string',
                'nullable',
            ],
        ];
    }
}
