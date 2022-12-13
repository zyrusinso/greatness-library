<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BorrowBooksRequest;

class BorrowBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1){
            $borrow = Borrow::all();
        }else{
            $borrow = Borrow::where('id', auth()->id())->get();
        }

        return view('app.dashboard.borrow-books.index', compact('borrow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.dashboard.borrow-books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowBooksRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $data = [
                'book_id' => $request->book,
                'user_id' => auth()->id(),
                'status' => 'Lended'
            ];

            Borrow::create($data);

            DB::commit();

        }catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed to create new account! please contact the admin to fix this problem!', //Verification failed.
            ], 500);
        }

        return redirect()->back()->withErrors(['success' => 'Successfully Borrowed Book']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
