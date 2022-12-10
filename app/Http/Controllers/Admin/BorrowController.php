<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowRequest;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.admin.borrow.index');
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
    public function store(BorrowRequest $request)
    {
        try{
            
            DB::beginTransaction();
            $borrow = Borrow::create($request->except('terms'));
            $monitorData = [
                'borrower_id' => $borrow->id,
                'name' => $borrow->fname.' '.$borrow->lname,
                'title' => $borrow->book->title,
                'status' => 'Lended'
            ];

            Monitor::create($monitorData);

        }catch(Throwable $err){
            DB::rollback();
            Log::critical($err);
            return response()->json([
                'success' => false,
                'message' => 'System failed! please contact the developer to fix the problem'
            ]);
        }

        DB::commit();

        return redirect(route('borrow.success', ['borrowId' => $borrow->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    // For borrow Form
    public function borrow(){
        $books = Book::all();
        return view('app.borrow', ['books' => $books]);
    }

    public function borrowedBook($borrowId){
        $borrow = Borrow::where('id', $borrowId)->first();
        $book = Book::where('id', $borrow->book_id)->first();

        return view('app.components.borrow', ['book' => $book, 'borrow' => $borrow]);
    }
}
