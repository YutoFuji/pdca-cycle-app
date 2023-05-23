<?php

namespace App\Services;

use App\Models\Goal;
use App\Models\PDCA;
use Illuminate\Support\Facades\Auth;

class PDCAService
{
    public function getIndexData($goal_id)
    {
        $goal = Goal::find($goal_id);
        $pdcas = PDCA::where('goal_id', $goal_id)->get();
        $plan = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Plan')->first();
        $do = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Do')->first();
        $check = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Check')->first();
        $act = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Act')->first();

        return compact('goal', 'goal_id', 'pdcas', 'plan', 'do', 'check', 'act');
    }

    public function getCreateData($goal_id)
    {
        $goal = Goal::find($goal_id);
        $plan = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Plan')->first();
        $do = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Do')->first();
        $check = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Check')->first();
        $act = PDCA::where('goal_id', $goal_id)->where('pdca_elem', 'Act')->first();

        return compact('goal', 'goal_id', 'plan', 'do', 'check', 'act');
    }

    public function storePDCA($goal_id, $pdca_elem, $content)
    {
        PDCA::updateOrCreate(
            ['goal_id' => $goal_id, 'pdca_elem' => $pdca_elem, 'user_id' => Auth::id()],
            ['content' => $content]
        );
    }

    public function getPDCA($goal_id, $pdca_elem)
    {
        $pdca = PDCA::where('goal_id', $goal_id)
            ->where('pdca_elem', $pdca_elem)
            ->select('content')
            ->first();

        return $pdca;
    }
}