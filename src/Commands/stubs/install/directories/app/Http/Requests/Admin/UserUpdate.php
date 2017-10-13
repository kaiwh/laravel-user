<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if (is_null($request->get('password'))) {
            return [
                'name' => 'required|string',
            ];
        } else {
            return [
                'name'                  => 'required|string',
                'password'              => 'required|string|min:6|max:20|confirmed',
                'password_confirmation' => 'required|string',
            ];
        }
    }
}
