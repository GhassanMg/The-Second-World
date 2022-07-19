<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name'   => 'required|string|min:5|unique:facilities,name',
            'description'   => 'required|string',
            'type'   => 'required|string',
            'status'   => 'boolean|nullable',
            'price'   => 'required|numeric',
            "points"    => "required|array|min:2",
            "points.*"  => "required|",
        ];
    }
    public function attributes()
    {
        return [

            'name' => 'facility name',
            'type' => 'facility type',
            'description' => 'facility description',
            'status'   => 'facility status',
            'price'   => 'facility price',
            "points"    => "facility points",

            // "points.*"  => "required|",
        ];
    }
}
