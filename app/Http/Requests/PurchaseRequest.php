<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PurchaseRequest extends Request
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
        $rules[] = "";
        $seats = Input::get('Seat');
//        print_r($seats);
        for ($x = 0; $x < sizeof($seats); $x++) {
            $rules[$x] = 'Seat[' . $x . '] => required <br />';
        }
//        print_r($rules);
//        Validator::make($rules);
        return [
            $rules
        ];
    }

}
