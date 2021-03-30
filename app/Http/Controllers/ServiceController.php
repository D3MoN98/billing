<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service_create');
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
            'name' => 'required',
            'service_time' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);

        Service::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'service_time' => $request->service_time,
            'service_time_uom' => $request->service_time_uom ?? 'hour',
            'cost' => $request->cost,
            'note' => $request->note,
        ]);

        return redirect()->route('service.create')->withSuccess('Service Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('service_edit')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('service_edit')->with('service', $service);
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
            'name' => 'required',
            'service_time' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);

        Service::find($id)->update([
            'name' => $request->name,
            'service_time' => $request->service_time,
            'service_time_uom' => $request->service_time_uom,
            'cost' => $request->cost,
            'note' => $request->note,
        ]);


        return redirect()->route('service.edit', $id)->withSuccess('Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->back()->withSuccess('Service deleted');
    }
}