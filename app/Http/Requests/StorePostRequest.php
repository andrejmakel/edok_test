<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'post_nr' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'file_short_text' => [
                'string',
                'nullable',
            ],
            'status_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'customer_notice' => [
                'string',
                'nullable',
            ],
            'processed_at' => [
                'date_format:' . config('panel.date_format'),
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
            'for_recipient' => [
                'string',
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
        ];
    }
}
