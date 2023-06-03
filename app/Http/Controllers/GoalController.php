<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Services\GoalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    private $goalService;

    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goals = $this->goalService->getGoalsByUser(Auth::id());
        $keyword = $request->input('keyword');
        return view('goals.index', compact('goals', 'keyword'));
    }

    public function indexDone()
    {
        $goals = $this->goalService->getCompletedGoalsByUser(Auth::id());
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
     * @param  \App\Http\Requests\CreateGoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->goalService->createGoal($request->validated(), Auth::id());

        return redirect()->route('goals.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = $this->goalService->getGoalById($id);
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGoalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->goalService->updateGoal($id, $request->validated(), Auth::id());

        return redirect()->route('goals.index');
    }
    
    public function updateBoolean($id)
    {
        $this->goalService->updateGoalDoneStatus($id);
        
        return redirect()->route('goals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $this->goalService->deleteGoal($id);

        return redirect()->route('goals.index');        
   }
}