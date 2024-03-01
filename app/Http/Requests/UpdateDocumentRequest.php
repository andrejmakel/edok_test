<?php

namespace App\Http\Requests;

use App\Models\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('document_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'document_code' => [
                'string',
                'nullable',
            ],
            'file_short_text' => [
                'string',
                'nullable',
            ],
            'payment_info' => [
                'string',
                'max:35',
                'nullable',
            ],
            'iban' => [
                'string',
                'max:24',
                'nullable',
            ],
            'swift' => [
                'string',
                'max:11',
                'nullable',
            ],
            'vs' => [
                'string',
                'max:10',
                'nullable',
            ],
            'ss' => [
                'string',
                'max:10',
                'nullable',
            ],
            'ks' => [
                'string',
                'max:4',
                'nullable',
            ],
            'paid' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'reads.*' => [
                'integer',
            ],
            'reads' => [
                'array',
            ],
        ];
    }
}
