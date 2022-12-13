<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1){
            return redirect(route('admin.dashboard'));
        }

        $borrows = Borrow::where('user_id', auth()->id())->get();

        return view('app.user.dashboard', compact('borrows'));
    }

    public function privacyAndTerms()
    {
        return view('app.privacy-and-terms');
    }
}
