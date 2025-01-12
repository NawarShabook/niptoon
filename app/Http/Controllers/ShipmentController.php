<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShipmentController extends Controller
{
    public $get_booking_type=["ocean"=>"Ocean Cargo", "air"=>"Air Cargo", "lcl"=>"Land Shipping TR"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $shipments = Shipment::whereHas('regions', function ($query) {
        //     $query->has('actions');
        // })->latest()->get();
        $shipments=Shipment::has('regions')->where(['published'=>false])->latest()->get();
        $get_booking_type=$this->get_booking_type;
        return view('shipments.all_shipments', compact('shipments','get_booking_type'));
    }
    /**
     * Display a listing of the resource.
     */
    public function recent_shipments()
    {
        $shipments=Shipment::whereDoesntHave('regions')->latest()->get();
        $get_booking_type=$this->get_booking_type;
        return view('shipments.recent_shipments', compact('shipments','get_booking_type'));

    }
    /**
     * Display a listing of the resource.
     */
    public function posted_shipments()
    {
        $shipments=Shipment::where(['published'=>true])->latest()->get();
        $get_booking_type=$this->get_booking_type;
        return view('shipments.posted_shipments', compact('shipments','get_booking_type'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code_id' => [
                'required',
                Rule::unique('shipments')->where(function ($query) use ($request) {
                    return $query->where('type', $request->type);
                }),
            ],
            'type' => 'required|in:ocean,air,lcl',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        try {
            //mass assignment
            Shipment::create([
                'name' => $request->name,
                'code_id' => $request->code_id,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
            ]);

            return back()->with('success','The Shipment Has Been Created Successfully');

        } catch (\Throwable $th) {
            return back()->with('errors','');
        }

    }

    /**
     * Publish the specified resource.
     */
    function publish_shipment(Shipment $shipment)
    {

        try {
            $shipment->published=!$shipment->published;
            $shipment->save();
            if($shipment->published){
                return back()->with('success','The Shipment Has Been Published Successfully');
            }
            else{
                return back()->with('success','The Shipment Has Been Unpublished Successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        $get_booking_type=$this->get_booking_type;
        return view('shipments.show', compact('shipment','get_booking_type'));
    }

    /**
     * Display the specified resource.
     */
    public function track(Request $request)
    {
        $request->validate([
            'code_id' => 'string|max:20',
            'type' => 'in:ocean,air,lcl',
        ]);
        $info = \App\Models\SystemSettings::first();
        $shipment=Shipment::where(["code_id"=>$request->code_id, "type"=>$request->type, "published"=>true])->first();

        if($shipment)
        {

            $last_updated=$this->getLastUpdated($shipment->id);
            $last_location=$this->getLastLocation($shipment->id);
            return view('shipments.tracking', compact('shipment', 'last_updated', 'last_location','info'));
        }
        else{
            $code_id='';
            if($request->code_id){
                $message="The Shipment is not found";
                $code_id=$request->code_id;
            }
            else{
                $message="Please enter shipment id";
            }
            return view('shipments.tracking', compact('code_id', 'message','info'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        $get_booking_type=$this->get_booking_type;
        return view('shipments.edit', compact('shipment','get_booking_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'name' => 'required',
            'code_id' => [
                'required',
                Rule::unique('shipments')->where(function ($query) use ($request) {
                    return $query->where('type', $request->type);
                })->ignore($shipment->id),
            ],
            'type' => 'required|in:ocean,air,lcl',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        try {
            //mass assignment
            $shipment->update([
                'name' => $request->name,
                'code_id' => $request->code_id,
                'type' => $request->type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
            ]);

            return back()->with('success','The Shipment Has Been Updated Successfully');

        } catch (\Throwable $th) {
            return back()->with('errors','');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        if($shipment==null)
        {
            return redirect()->back();
        }

        try {
            $shipment->delete();
            return redirect()->back()->with('success','The Shipment Has Been Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function getLastUpdated($shipmentId)
    {

        $shipment = Shipment::with(['regions.actions'])->findOrFail($shipmentId);
        $lastUpdated = $shipment->updated_at;
        foreach ($shipment->regions as $region) {
            $lastUpdated = $lastUpdated->max($region->updated_at);
            foreach ($region->actions as $action) {
                $lastUpdated = $lastUpdated->max($action->updated_at);
            }
        }

        if(!isset($lastUpdated)){
            $lastUpdated='none';
        }
        return $lastUpdated;
    }
    public function getLastLocation($shipmentId)
    {

        $shipment = Shipment::with(['regions.actions'])->findOrFail($shipmentId);
        foreach ($shipment->regions as $region) {
            foreach ($region->actions->where('active', true) as $action) {
                $lastActiveAction = $action;

            }
        }
    	if(!isset($lastActiveAction)){
			 $lastActiveAction='none';
		}
        return $lastActiveAction;
    }
}
