<?php

namespace App\Http\Requests;

use App\Helpers\ResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    protected function failedAuthorization()
    {
        throw new HttpResponseException(
            ResponseHelper::jsonResponse(
                [],
                'You are not authorized to perform this action',
                403,
                false
            )
        );
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = collect($validator->errors())->map(fn ($message) => $message[0]);

        throw new HttpResponseException(
            ResponseHelper::jsonResponse(
                $errors->toArray(),
                'Validation failed',
                400,
                false
            )
        );
    }
}
