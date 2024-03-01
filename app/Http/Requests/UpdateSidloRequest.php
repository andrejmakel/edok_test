<?php

namespace App\Http\Requests;

use App\Models\Sidlo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSidloRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sidlo_edit');
    }

    public function rules()
    {
        return [
            'sidlo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
