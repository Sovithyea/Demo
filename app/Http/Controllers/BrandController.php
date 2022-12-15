<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::latest()->get();

        return view('brand.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $image = null;

        if($request->image) {

            $image = $request->image->store('images');

        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $image;
        $brand->save();

        return to_route('brands.index')->with('message', 'Created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $brand = Brand::find($id);

        return view('brand.edit', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {

        $image = null;

        if($request->image) {

            $image = $request->image->store('images');

        }

        $brand = Brand::find($id);
        $brand->name = $request->name;

        // dd($request->image);

        if($request->image) {

            $brand->image = $image;

        }

        $brand->save();

        return to_route('brands.index')->with('message', "Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Brand::destroy($id);

        return to_route('brands.index')->with('message', '1 brand has been removed');

    }
}
