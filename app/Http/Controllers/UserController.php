<?php namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = User::paginate(5);
//        foreach($data as $key => $user) {
//            if(!$user->customer) {
//                unset($data[$key]);
//            }
//        }
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = Role::whereNotIn('roleName', array('Root' ,'Customer'))->get();
        return view('user.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = new User();
        $user->name = $data['firstName'] . " " . $data['lastName'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = $data['role'];
        $user->save();
        return redirect('users/')->with('success', 'User created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = User::where('id', '=', $id)->first();
        $name = explode(" ", $data['name']);
        $data['firstName'] = $name['0'];
        $data['lastName'] = $name['1'];
        $data2 = Role::all();
        return view('user.edit', compact('data'), compact('data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UserRequest $request)
    {
        $data = $request->all();
        $user = User::where('id','=', $data['id'])->first();
        $user->name = $data['firstName'] . " " . $data['lastName'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = $data['role'];
        $user->save();
        return redirect('users/')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = User::where('id','=', $id)->first();
        $data->delete();
        return redirect('users/')->with('success', 'User deleted successfully!');
    }

}
