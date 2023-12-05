<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::where('status', 1)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        //$goals = Auth::user(1)->goals->where('status', 1)get;
        return view('goals.completed', ['goals' => $goals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $goal = new Goal;
        $goal->title = $request->get('title');
        $goal->description = $request->get('description');
        $goal->end_date = $request->get('end_date');
        $goal->user_id = Auth::id();
        $goal->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /** G
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $goal = DB::table('goals')->where('id', $id)->where('user_id', Auth::id())->first();

        return view('goals.edit', ['goal' => $goal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('goals')->where('id', $id)->where('user_id', Auth::id())->update(['title' => $request->get('title'), 'description' => $request->get('description'), 'end_date' => $request->get('end_date')]);

        return redirect('/');
    }

    public function complete(int $id)
    {
        $status = DB::table('goals')->select('status')->where('id', $id)->where('user_id', Auth::id())->get()[0]->status;

        $new_status = ($status == 0) ? 1 : 0;
        DB::table('goals')->where('id', $id)->where('user_id', Auth::id())->update(['status' => $new_status]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        DB::table('goals')->where('id', '=', $id)->where('user_id', '=', Auth::id())->delete();
        return redirect('/');;
    }
}
