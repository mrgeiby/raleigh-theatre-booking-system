<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CustomerRequest extends Request {

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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required',
            'address' => 'required',
            'town' => 'required',
            'postCode' => 'required|min:3|max:9',
            'phoneNumber' => 'required|min:11|max:13',
        ];
    }

}
