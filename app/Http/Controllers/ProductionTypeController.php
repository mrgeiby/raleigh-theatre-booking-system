<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductionType;
use Illuminate\Http\Request;
use App\Http\Requests\ProductionTypeRequest;

class ProductionTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = ProductionType::paginate(5);
        return view('productiontype.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('productiontype.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductionTypeRequest $request)
	{
        $data = $request->all();
        $productionType = new ProductionType();
        $productionType->prodType = $data['Name'];
        $productionType->save();
        return redirect('productionTypes/')->with('success', 'Production type created successfully!');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
//        $data = ProductionType::find($id)->first();
        $data = ProductionType::where('id', '=', $id)->first();

        return view('productiontype.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ProductionTypeRequest $request)
	{
        $data = $request->all();
//        $productiontype = ProductionType::find($data['id'])->first();
        $productionType = ProductionType::where('id', '=', $data['id'])->first();
        $productionType->prodType = $data['Name'];
        $productionType->save();
        return redirect('productionTypes/')->with('success', 'Production type updated successfully!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
