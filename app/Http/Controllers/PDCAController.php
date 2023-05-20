<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Services\PDCAService;

class PDCAController extends Controller
{
    private $pdcaService;

    public function __construct(PDCAService $pdcaService)
    {
        $this->pdcaService = $pdcaService;
    }

    public function index($goal_id)
    {
        $goal = Goal::where('id', $goal_id)->first();
        $pdcas = $this->pdcaService->getPDCAByGoalId($goal_id);
        $plan = $this->pdcaService->getPDCAByElement($goal_id, 'Plan');
        $do = $this->pdcaService->getPDCAByElement($goal_id, 'Do');
        $check = $this->pdcaService->getPDCAByElement($goal_id, 'Check');
        $act = $this->pdcaService->getPDCAByElement($goal_id, 'Act');

        return view('pdcas.index', compact('goal', 'goal_id', 'pdcas', 'plan', 'do', 'check', 'act'));
    }

    public function create($goal_id)
    {
        $goal = Goal::where('id', $goal_id)->first();
        $plan = $this->pdcaService->getPDCAByElement($goal_id, 'Plan');
        $do = $this->pdcaService->getPDCAByElement($goal_id, 'Do');
        $check = $this->pdcaService->getPDCAByElement($goal_id, 'Check');
        $act = $this->pdcaService->getPDCAByElement($goal_id, 'Act');

        return view('pdcas.create', compact('goal', 'goal_id', 'plan', 'do', 'check', 'act'));
    }

    public function store(Request $request, $goal_id)
    {
        $request->validate([
            'pdca_elem' => 'required',
            'content' => 'required',
        ]);

        $pdca_elem = $request->input('pdca_elem');
        $content = $request->input('content');

        $this->pdcaService->storePDCA($goal_id, $pdca_elem, $content);

        return redirect()->route('pdcas.index', ['goal_id' => $goal_id]);
    }

    public function get_pdca(Request $request, $goal_id)
    {
        $pdca = $this->pdcaService->getPDCAByElement($goal_id, $request->pdca_elem, ['content']);

        return response()->json($pdca, 200);
    }
}
