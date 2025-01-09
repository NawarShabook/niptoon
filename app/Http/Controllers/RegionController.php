<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Shipment;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($shipment_id)
    {

        $shipment=Shipment::where('id',$shipment_id)->first();

        if(!$shipment){
            return redirect()->back();

        }
        return view('regions.create',compact('shipment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'shipment_id' => 'required|exists:shipments,id',
        ]);

        try {
            //mass assignment
            Region::create([
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'location_link' => $request->location_link,
                'shipment_id' => $request->shipment_id,
            ]);

            return back()->with('success','The Region Has Been Added Successfully');

        } catch (\Throwable $th) {
            return back()->with('errors','');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('regions.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',

        ]);
        try {
            $region->update($request->only(['first_name', 'second_name','location_link']));
            return back()->with('success','The Region Has Been Updated Successfully');

        } catch (\Throwable $th) {
            return back()->with('errors','');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        if($region==null)
        {
            return redirect()->back();
        }

        try {
            $region->delete();
            return redirect()->route('regions.create',$region->shipment)->with('success','The Region Has Been Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }


}
