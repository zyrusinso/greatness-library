<?php

namespace App\Http\Controllers;

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

        return view('app.user.dashboard');
    }

    public function privacyAndTerms()
    {
        return view('app.privacy-and-terms');
    }
}
