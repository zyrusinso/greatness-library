<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\VisitorLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;

class VisitorLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = VisitorLogs::all();
        return view('app.admin.visitor.index', compact('visitors'));
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
    public function store(VisitorRequest $request)
    {
        VisitorLogs::create($request->except('terms'));

        if(auth()->user()){
            return redirect(route('visitor-logs.index'));
        }
        return redirect(route('visitor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitorLogs  $visitorLogs
     * @return \Illuminate\Http\Response
     */
    public function show($visitorLogs)
    {
        $visitor = VisitorLogs::where('id', $visitorLogs)->first();
        $books = Book::all();
        return view('app.admin.visitor.show', compact('visitor', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitorLogs  $visitorLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitorLogs $visitorLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitorLogs  $visitorLogs
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorRequest $request, $visitorLogs)
    {
        VisitorLogs::where('id', $visitorLogs)->update($request->validated());

        return redirect(route('visitor-logs.show', $visitorLogs));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitorLogs  $visitorLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitorLogs $visitorLogs)
    {
        //
    }
}
