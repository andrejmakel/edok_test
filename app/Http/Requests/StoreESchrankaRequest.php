<?php

namespace App\Http\Requests;

use App\Models\ESchranka;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreESchrankaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('e_schranka_create');
    }

    public function rules()
    {
        return [
            'splnomocnenec' => [
                'string',
                'nullable',
            ],
        ];
    }
}
