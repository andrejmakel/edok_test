<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'nazov' => [
                'string',
                'nullable',
            ],
            'short_name' => [
                'string',
                'nullable',
            ],
            'superfaktura' => [
                'string',
                'nullable',
            ],
            'id_mmc' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'id_pohoda' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'contacts.*' => [
                'integer',
            ],
            'contacts' => [
                'array',
            ],
            'address' => [
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
            'phone' => [
                'string',
                'nullable',
            ],
            'send_address' => [
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
