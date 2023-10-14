<?php

namespace App\Http\Requests;

use App\Models\OutgoingPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOutgoingPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outgoing_post_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
