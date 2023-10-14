<?php

namespace App\Http\Requests;

use App\Models\EPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('e_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:e_posts,id',
        ];
    }
}
