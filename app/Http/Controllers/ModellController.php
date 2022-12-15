<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Modell;
use Illuminate\Http\Request;

class ModellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modells = Modell::get();
        return view('modell.index', compact('modells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('modell.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $modell = new Modell();
        $modell->name = $request->name;
        $modell->brand_id = $request->brand_id;
        $modell->save();

        return to_route('modells.index')->with('message', "Created");

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
        $modell = Modell::find($id);
        $brands = Brand::all();

        return view('modell.edit', compact('modell', 'brands'));
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

        $modell = Modell::find($id);
        $modell->name = $request->name;
        $modell->brand_id = $request->brand_id;
        $modell->save();

        return to_route('modells.index')->with('message', "Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modell::destroy($id);
        return to_route('modells.index')->with('message', 'deleted');
    }
}
