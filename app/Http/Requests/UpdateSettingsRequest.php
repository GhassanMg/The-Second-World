<?php

namespace App\Http\Requests\Settings;

use App\Http\Controllers\Classes\ApiResponseClass;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateSettingsRequest extends FormRequest
{


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponseClass::validateResponse($validator->errors())
        );
    }
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
            'version'    => 'string' ,
            'ads_timer'  => 'date_format:H:i:s' ,
        ];
    }

    public function attributes()
    {
        // return[
        //     'live_url' => transValidationParameter('live_url'),
        //     'subscription_amount' => transValidationParameter('subscription_amount'),
        //     'subscription_points' => transValidationParameter('subscription_points'),
        //     'instructions_en' => transValidationParameter('instructions_en'),
        //     'instructions_ar' => transValidationParameter('instructions_ar'),
        //     'cube_points' => transValidationParameter('cube_points'),
        //     'help_points' => transValidationParameter('help_points'),
        //     'ads_timer' => transValidationParameter('ads_timer'),
        //     'host'     => transValidationParameter('host'),
        // ];
    }
}
