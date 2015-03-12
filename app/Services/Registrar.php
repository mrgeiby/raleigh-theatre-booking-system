<?php namespace App\Services;

use App\User;
use App\Customer;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'address' => 'required',
            'town' => 'required',
            'postCode' => 'required|min:3|max:9',
            'phoneNumber' => 'required|min:11|max:13',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $user = User::create([
            'name' => $data['firstName'].' '.$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 4,
        ]);

        $customer = Customer::create([
            'firstName' => $data['firstName'] ,
            'lastName' => $data['lastName'],
            'address' => $data['address'],
            'town' => $data['town'],
            'postCode' => $data['postCode'],
            'phoneNumber' => $data['phoneNumber'],
            'userID' => $user['id'],
        ]);

		return $user;
	}

}
