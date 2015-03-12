<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Production;
use Illuminate\Http\Request;
use App\Performance;
use App\Http\Requests\PerformanceRequest;

class PerformanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Performance::paginate(5);
        return view('performance.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = Production::all();
        return view('performance.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PerformanceRequest $request)
    {
        $data = $request->all();
        $performance = new Performance();
        $performance->perfName = $data['Name'];
        $performance->perfDate = $data['Date'];
        $performance->prodID = $data['Production'];
        $performance->save();
        return redirect('performances/')->with('success', 'Performance created successfully!');
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
        $data = Performance::where('id', '=', $id)->first();
        $data2 = Production::all();
        return view('performance.edit', compact('data'), compact('data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PerformanceRequest $request)
    {
        $data = $request->all();
        $performance = Performance::where('id', '=', $data['id'])->first();
        $performance->perfName = $data['Name'];
        $performance->perfDate = $data['Date'];
        $performance->prodID = $data['Production'];
        $performance->save();
        return redirect('performances/')->with('success', 'Performance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = Performance::where('id', '=', $id)->first();
        $data->delete();
        return redirect('performances/')->with('success', 'Performance deleted successfully!');
    }

}
