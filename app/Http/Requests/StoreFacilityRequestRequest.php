<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacilityRequestRequest extends FormRequest
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
    public function rules()
    {
        return [
            'facility_id' => 'required|exists:facilities,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:buy,rent',
        ];
    }
    public function attributes()
    {
        return [
            'facility_id' => 'The facility id',
            'user_id' => 'The user id',
            'type' => 'Type of request',
        ];
    }
}
