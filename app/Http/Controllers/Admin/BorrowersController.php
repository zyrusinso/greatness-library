<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\User;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowersRequest;

class BorrowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = Borrower::all();

        return view('app.admin.borrowers.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.borrowers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowersRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $data = [
                'user_id' => $request->user_id,
                'status' => 'Student',
                'contact' => $request->contact,
                'address' => $request->address,
                'course' => $request->course,
                'date_of_birth' => $request->date_of_birth,
                'verified_at' => now(),
            ];

            Borrower::create($data);

            $userData = [
                'is_verified' => 1,
                'email_verified_at' => now(),
            ];

            User::where('id', $request->user_id)->update($userData);

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
        return redirect(route('borrowers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrower = Borrower::where('id', $id)->first();

        return view('app.admin.borrowers.show', compact('borrower'));
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
    public function update(BorrowersRequest $request, $id)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $data = [
                'contact' => $request->contact,
                'address' => $request->address,
                'course' => $request->course,
                'date_of_birth' => $request->date_of_birth,
            ];

            Borrower::where('id', $id)->update($data);

            DB::commit();

        }catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed to create new account! please contact the admin to fix this problem!', //Verification failed.
            ], 500);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrower = Borrower::where('id', $id)->first();
        $user = User::where('id', $borrower->user_id)->first();

        $user->update(['is_verified' => 0]);
        $borrower->delete();

        return redirect(route('borrowers.index'));
    }
}
