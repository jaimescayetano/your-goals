<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $goals = Goal::where('status', 0)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        //$goals = Auth::user(1)->goals->where('status', 0);
        return view('home', ['goals' => $goals]);
    }
}
