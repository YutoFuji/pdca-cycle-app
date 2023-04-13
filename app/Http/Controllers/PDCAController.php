<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\PDCA;
use Illuminate\Queue\Connectors\NullConnector;
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
        
        return view('pdcas.create', compact('goal_id', 'plan', 'do', 'check', 'act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $goal_id)
    {   
        $id = Auth::id();
        $pdca_elem = $request->input('pdca_elem');
        $content = $request->input('content');
        
        if(!empty('content')) {
            PDCA::updateOrCreate(
            ['goal_id' => $goal_id, 'pdca_elem' => $pdca_elem, 'user_id' => $id],
            ['content' => $content]
            );
        };

        return redirect()->route('pdcas.index', ['goal_id' => $goal_id,]);
        
    }
}
