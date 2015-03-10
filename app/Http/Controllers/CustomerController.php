<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\User;
use Auth;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Redirect;

class CustomerController extends Controller
{

//    protected $customer = Customer::();
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show()
    {
        $data = Customer::where('userID', '=', Auth::user()->id)->first();
        return view('customer.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit()
    {
        $data = Customer::where('userID', '=', Auth::user()->id)->first();
        return view('customer.edit', compact('data'))->with('success','Your account details have been updated successfully!');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UpdateCustomerRequest $request)
    {
        $data = $request->all();
        // Find Customer object in DB and update
        $customer = Customer::where('userID', '=', Auth::user()->id)->first();
        $customer->firstName = $data['firstName'];
        $customer->lastName = $data['lastName'];
        $customer->address = $data['address'];
        $customer->town = $data['town'];
        $customer->postCode = $data['postCode'];
        $customer->phoneNumber = $data['phoneNumber'];
        $customer->save();

        // Find Customer user object in DB and update
        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->name = $data['firstName'] . " " . $data['lastName'];
        $user->email = $data['email'];
        $user->save();

        // Get latest customer data from DB
        $data = Customer::where('userID', '=', Auth::user()->id)->first();

        //return show('customer.edit', compact('data'))->with('success', 'Your account details have been updated successfully!');
        return redirect('customer/show')->with('success', 'Your account details have been updated successfully!');
//        Redirect::to('customer.edit')->with('success', 'Your account details have been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
