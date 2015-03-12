<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = Role::paginate(10);
		return view('role.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('role.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RoleRequest $request)
	{
		$data = $request->all();
        $role = new Role();
        $role->roleName = $data['Name'];
        $role->roleDescription = $data['Description'];
        $role->save();
        return redirect('roles/')->with('success', 'Role created successfully!');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data = Role::where('id','=', $id)->first();
        return view('role.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RoleRequest $request)
	{
        $data = $request->all();
        $role = Role::where('id','=', $data['id'])->first();
        $role->roleName = $data['Name'];
        $role->roleDescription = $data['Description'];
        $role->save();
        return redirect('roles/')->with('success', 'Role updated successfully!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $data = Role::where('id','=', $id)->first();
        $data->delete();
        return redirect('roles/')->with('success', 'Role deleted successfully!');
	}

}
