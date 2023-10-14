<?php

namespace App\Http\Requests;

use App\Models\CallTyp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCallTypRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('call_typ_edit');
    }

    public function rules()
    {
        return [
            'call_typ' => [
                'string',
                'nullable',
            ],
        ];
    }
}
