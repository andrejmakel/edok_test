<?php

namespace App\Http\Requests;

use App\Models\Upload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upload_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'notice' => [
                'string',
                'nullable',
            ],
            'upload_file' => [
                'array',
            ],
        ];
    }
}