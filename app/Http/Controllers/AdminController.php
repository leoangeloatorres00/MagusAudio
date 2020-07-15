<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
     * Show the application admin page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        if(!Auth::user()->is_admin){
            return redirect('/home');
        }
        
        return view('admin');
    }

    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        if(!Auth::user()->is_admin){
            return redirect('/home');
        }
        
        if($request->ajax()) {
            return view('admin.dashboard');
        }
        return view('sublayouts/dashboard');
    }

    /**
     * Show the application admin users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user(Request $request)
    {
        if(!Auth::user()->is_admin){
            return redirect('/home');
        }
        
        $admins = DB::table('users')
            ->where('is_admin', 1)
            ->paginate(1);

        $users = DB::table('users')
            ->where('is_admin', 0)
            ->paginate(1);


        if($request->ajax()) {
            return view('admin.usercontainer')->with(['admins' => $admins, 'users' => $users]);
        }
        return view('sublayouts/admin')->with(['admins' => $admins, 'users' => $users]);
    }
}
