<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Auth::user()->goals;
        return view('goals.index', compact('goals'));
    }

    public function indexDone()
    {
        $goals = Auth::user()->goals;
        return view('goals.goal_done_list', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $goal = new Goal();
        $goal->content = $request->input('content');
        $goal->user_id = Auth::id();
        $goal->save();

        return redirect()->route('goals.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'content' => 'required',
        ]);
        
        $goal->content = $request->input('content');
        $goal->user_id = Auth::id();
        $goal->save();
        
        return redirect()->route('goals.index');
    }
    
    public function updateBoolean($id)
    {
        $goal = Goal::find($id);
        $goal->done = !$goal->done;
        $goal->save();
        
        return redirect()->route('goals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal) {

        $goal->delete();

        return redirect()->route('goals.index');        
   }
}
