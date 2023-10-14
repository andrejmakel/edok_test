<?php

namespace App\Http\Requests;

use App\Models\Stat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stat_edit');
    }

    public function rules()
    {
        return [
            'stat_sk' => [
                'string',
                'nullable',
            ],
            'stat_de' => [
                'string',
                'nullable',
            ],
        ];
    }
}
