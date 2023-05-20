<?php

namespace App\Repositories;

use App\Models\Goal;
use App\Models\PDCA;
use Illuminate\Support\Facades\Auth;

class PDCARepository
{
    public function getPDCAByGoalId($goal_id)
    {
        return PDCA::where('goal_id', $goal_id)->get();
    }

    public function getPDCAByElement($goal_id, $pdca_elem, $select = ['*'])
    {
        return PDCA::where('goal_id', $goal_id)
            ->where('pdca_elem', $pdca_elem)
            ->select($select)
            ->first();
    }

    public function storePDCA($goal_id, $pdca_elem, $content)
    {
        PDCA::updateOrCreate(
            ['goal_id' => $goal_id, 'pdca_elem' => $pdca_elem, 'user_id' => Auth::id()],
            ['content' => $content]
        );
    }
}