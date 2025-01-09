<?php

namespace App\Http\Controllers;
use App\Models\Shipment;
use App\Models\Region;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
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
    public function create($region_id)
    {

        $region=Region::where('id',$region_id)->first();

        if(!$region){
            return redirect()->back();
        }
        return view('actions.create',compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'icon' => 'required',
            'region_id' => 'required|exists:regions,id'
        ]);

        try {
            for ($i=0; $i < count($request->name) ; $i++) { 
                //mass assignment
                Action::create([
                    'name' => $request->name[$i],
                    'date' => $request->date[$i],
                    'icon' => $request->icon[$i],
                    'region_id' => $request->region_id,
                    'notes' => $request->notes[$i],
                ]);
            }
            return back()->with('success','The Action Has Been Added Successfully');
        } catch (\Throwable $th) {
            return back()->with('errors','');
        }

    }

    /**
     * Active the specified resource.
     */
    function active_action(Action $action)
    {   

        try {
            
            $action->active=!$action->active;
            $action->save();
     
            if($action->active){
                return back()->with('success','The Action Has Been Activated Successfully');
            }
            else{
                return back()->with('success','The Action Has Been Unactivated Successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('errors',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action)
    {
        if($action==null)
        {
            return redirect()->back();
        }

        try {
            $action->delete();
            return redirect()->back()->with('success','The Action Has Been Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
