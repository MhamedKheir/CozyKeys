<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // أو تحقق من صلاحيات المستخدم إذا بدك
    }

    public function rules(): array
    {
        return [];
    }
}
