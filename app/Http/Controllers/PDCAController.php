<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data = $this->pdcaService->getIndexData($goal_id);
        return view('pdcas.index', $data);
    }

    public function create($goal_id)
    {   
        $data = $this->pdcaService->getCreateData($goal_id);
        return view('pdcas.create', $data);
    }

    public function store(Request $request, $goal_id)
    {   
        $this->validate($request, [
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
        $pdca = $this->pdcaService->getPDCA($goal_id, $request->pdca_elem);

        return response()->json($pdca, 200);
    }
}
