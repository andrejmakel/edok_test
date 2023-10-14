<?php

namespace App\Http\Requests;

use App\Models\Recipient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRecipientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recipient_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'street_nr' => [
                'string',
                'nullable',
            ],
            'psc' => [
                'string',
                'nullable',
            ],
            'mesto_sk' => [
                'string',
                'nullable',
            ],
            'mesto_de' => [
                'string',
                'nullable',
            ],
        ];
    }
}
