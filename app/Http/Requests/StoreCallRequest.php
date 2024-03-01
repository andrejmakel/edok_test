<?php

namespace App\Http\Requests;

use App\Models\Call;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCallRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('call_create');
    }

    public function rules()
    {
        return [
            'date_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'company' => [
                'string',
                'nullable',
            ],
            'call_nr' => [
                'string',
                'nullable',
            ],
            'short_notice' => [
                'string',
                'nullable',
            ],
            'send_email' => [
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
