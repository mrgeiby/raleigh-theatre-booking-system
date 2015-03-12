<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Production;
use App\ProductionType;
use Illuminate\Http\Request;
use App\Http\Requests\ProductionRequest;
use Illuminate\Support\Str;


class ProductionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = ProductionType::all();
        return view('production.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = ProductionType::all();
        return view('production.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductionRequest $request
     * @return Response
     */
    public function store(ProductionRequest $request)
    {
        $data = $request->all();
        $production = new Production();
        $production->prodName = $data['Name'];
        $production->prodDescription = $data['Description'];
        $production->prodSlug = $this->getSlug($data['Name']);
        $production->prodTypeID = $data['Type'];
        $production->save();
        return redirect('productions/manage')->with('success', 'Production created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return Response
     */
    public function show($slug)
    {
        $data = Production::where('prodSlug', '=', $slug)->first();
        return view('production.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return Response
     */
    public function edit($slug)
    {
        $data = Production::where('prodSlug', '=', $slug)->first();
        $data2 = ProductionType::all();
        return view('production.edit', compact('data'), compact('data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductionRequest $request
     * @return Response
     */
    public function update(ProductionRequest $request)
    {
        $data = $request->all();
        $production = Production::where('prodSlug', '=', $data['Slug'])->first();
        if (strcmp($production->prodName, $data['Name'])) {
            $production->prodSlug = $this->getSlug($data['Name']);
        }
        $production->prodName = $data['Name'];
        $production->prodDescription = $data['Description'];
        $production->prodTypeID = $data['Type'];
        $production->save();
        return redirect('productions/manage')->with('success', 'Production updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return Response
     */
    public function destroy($slug)
    {
        $data = Production::where('prodSlug', '=', $slug)->first();
        $data->delete();
        return redirect('productions/manage')->with('success', 'Production deleted successfully!');
    }

    public function getSlug($prodName)
    {
        $slug = Str::slug($prodName);
        $slugCount = count(Production::whereRaw("prodSlug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }

    public function manage()
    {
        $data = Production::paginate(5);
        return view('production.manage', compact('data'));
    }

}
