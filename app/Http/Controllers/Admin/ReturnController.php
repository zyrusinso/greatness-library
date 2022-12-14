<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\User;
use App\Models\Borrow;
use App\Models\ReturnBook;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = ReturnBook::all();

        return view('app.admin.return.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Collection();
        $borrows = Borrow::where('user_id', auth()->id())->get();
        
        foreach($borrows as $item){
            if(!ReturnBook::where('borrow_id', $item->id)->first()){
                $data->push($item);
            }
        }

        return view('app.admin.return.create', ['borrows' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $borrow = Borrow::where('id', $request->borrow)->first();

        try {
            DB::beginTransaction();

            $data = [
                'book_id' => $borrow->book_id,
                'borrow_id' => $borrow->id,
                'user_id' => auth()->id()
            ];

            ReturnBook::create($data);

            $borrow->update(['status' => 'Returned']);

            if(\Carbon\Carbon::parse($borrow->due_date) <= now()){
                $fined = (now()->diffInDays($borrow->due_date)+1)*3;
                $user = User::where('id', auth()->id())->first();
                $user->update(['balance' => $fined+$user->balance]);
            }

            DB::commit();

        }catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed to create new account! please contact the admin to fix this problem!', //Verification failed.
            ], 500);
        }

        if($request->has('another')){
            return redirect()->back();
        }

        return redirect(route('book-return.create'))->withErrors(['success' => 'Successfully returned the book!']);
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
