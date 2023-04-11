<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\PDCA;
use Illuminate\Support\Facades\Auth;

class PDCAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($goal_id)
    {

        $pdcas = PDCA::where('goal_id', $goal_id)->get();
        return view('pdcas.index', compact('goal_id', 'pdcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($goal_id)
    {   
        $plan = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Plan')->first();
        $do = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Do')->first();
        $check = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Check')->first();
        $act = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Act')->first();
        
        return view('pdcas.create', compact('goal_id', 'plan','do','check','act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $goal_id)
    {   
        $request->validate([
            'pdca_elem' => 'required|unique:p_d_c_a_s,pdca_elem,NULL,id,goal_id,'.$goal_id
        ]);   

        PDCA::create([
            'content' => $request->input('content'),
            'pdca_elem' => $request->input('pdca_elem'),
            'user_id' => Auth::id(),
            'goal_id' => $goal_id,
        ]);

        return redirect()->route('pdcas.index', ['goal_id' => $goal_id,]);
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
    public function edit($goal_id, $pdca)
    {
        return view('pdcas.edit', compact('goal_id', 'pdca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $goal_id, $pdca)
    {   
        
        PDCA::where('id', $pdca)
            ->where('goal_id', $goal_id)
            ->update([
                'content' => $request->input('content'),
            ]);

        return redirect()->route('pdcas.index', compact('goal_id'));
    }
}
