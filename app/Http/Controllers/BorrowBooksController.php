<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Book;
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
        $borrow = Borrow::orderBy('id', 'DESC')->get();

        return view('app.dashboard.borrow-books.index', compact('borrow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();

        return view('app.dashboard.borrow-books.create', compact('books'));
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

        $borrower = Borrow::where('user_id', auth()->id())->where('status', 'Lended')->get();
        
        if(count($borrower) >= 3){
            return redirect()->back()->withErrors(['error' => 'Maximum borrowed book has reached!']);
        }

        try {
            DB::beginTransaction();

            $data = [
                'book_id' => $request->book,
                'user_id' => auth()->id(),
                'status' => 'Lended',
                'due_date' => now()->addDays(7)
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
