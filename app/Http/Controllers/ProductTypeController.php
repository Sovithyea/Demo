<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::paginate(10);
        return view('product_type.index', compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $product_type = new ProductType;
        $product_type->name = $request->name;
        $product_type->save();
        return to_route('product-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = ProductType::find($id);
        return view('product_type.edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $product_type = ProductType::find($id);
        $product_type->name = $request->name;
        $product_type->save();
        return to_route('product-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductType::destroy($id);
        return to_route('product-types.index');
    }

    public function trash()
    {
        $product_types = ProductType::onlyTrashed()->get();
        return view('product_type.trash', compact('product_types'));
    }

    public function recovery($id)
    {
        $product_type =  ProductType::onlyTrashed()->find($id);
        $product_type->restore();
        return to_route('product-types.trash');
    }

    public function forceDelete($id)
    {
        $product_type =  ProductType::onlyTrashed()->find($id);
        $product_type->forceDelete();
        return to_route('product-types.trash');
    }
}
