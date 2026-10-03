<?php

namespace App\Http\Front\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeToEmailListRequest extends FormRequest
{
    protected $redirect = '/?subscription-failed=1';

    /** @return array<string, array<int, string>> */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
