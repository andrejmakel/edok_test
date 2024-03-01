<?php

namespace App\Http\Requests;

use App\Models\Sidlo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSidloRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sidlo_create');
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
