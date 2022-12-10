<?php

namespace App\Http\Controllers\Admin;

use App\Models\Borrow;
use App\Models\Monitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MonitorRequest;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = Monitor::all();
        return view('app.admin.borrow.index', compact('monitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show($monitorId)
    {
        $monitor = Monitor::where('id', $monitorId)->first();
        return view('app.admin.borrow.show', compact('monitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(MonitorRequest $request, Monitor $monitor)
    {
        $request->validated();

        $monitor->update($request->validated());
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitor)
    {
        //
    }

    public function markUpdate($id){
        $monitor = Monitor::where('id', $id)->first();
        $monitor->update(['status' => 'Returned']);

        return redirect()->back();
    }
}
