<?php

namespace App\Http\Requests;

use App\Models\OutgoingPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutgoingPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('outgoing_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:outgoing_posts,id',
        ];
    }
}
