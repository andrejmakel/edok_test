<?php

namespace App\Http\Requests;

use App\Models\Car;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_create');
    }

    public function rules()
    {
        return [
            'model' => [
                'string',
                'nullable',
            ],
            'ecv' => [
                'string',
                'nullable',
            ],
            'vin' => [
                'string',
                'nullable',
            ],
            'sk_register' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'stk_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pzp_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pzp_cislo' => [
                'string',
                'nullable',
            ],
            'pzp_documents' => [
                'array',
            ],
            'kasko_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'kasko_cislo' => [
                'string',
                'nullable',
            ],
            'kasko_dokuments' => [
                'array',
            ],
        ];
    }
}
