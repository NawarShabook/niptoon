<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSettings;
class SystemSettingsController extends Controller
{
    public function create()
    {
        $settings = SystemSettings::first();
		if(!isset($settings)){
			$settings=new SystemSettings();
			$settings->location='';
			$settings->number='';
		}
        return view('settings',compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'location' => 'required|string|max:255',
            'number' => 'required|numeric',
        ]);

        try {
            SystemSettings::truncate();
            SystemSettings::create($request->all());
            return back()->with('success','info updated successfully');

        } catch (\Throwable $th) {
            return back()->with('errors', $th->getMessage());
        }
    }
}
