<?php

namespace App\Http\Requests;

use App\Models\Processed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProcessedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('processed_edit');
    }

    public function rules()
    {
        return [
            'processed' => [
                'string',
                'nullable',
            ],
            'processed_de' => [
                'string',
                'nullable',
            ],
            'processed_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
