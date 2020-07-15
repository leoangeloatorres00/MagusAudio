<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(Request $request)
    {
        if(Auth::user()->is_admin){
            return redirect('/admin');
        }

        if(Auth::user()->is_first_login){
            return redirect('/initial/preference');
        }
        
        return view('home');
    }

    public function preference()
    {
        return view('component.preference');
    }

    public function membership(Request $request)
    {   
        if($request->method() == 'POST'){
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['is_first_login' => 0]);
            
            return redirect('/');
        }
       
        return view('component.membership');
    }

    public function premiumregister(Request $request)
    {   
        return redirect('/premium');
    }
}
