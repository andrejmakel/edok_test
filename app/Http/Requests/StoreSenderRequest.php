<?php

namespace App\Http\Requests;

use App\Models\Sender;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSenderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sender_create');
    }

    public function rules()
    {
        return [
            'sender' => [
                'string',
                'nullable',
            ],
            'sender_de' => [
                'string',
                'nullable',
            ],
            'sender_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
