<?php

namespace App\Services;

use App\Repositories\GoalRepository;
use Illuminate\Support\Facades\Auth;

class GoalService
{
    private $goalRepository;

    public function __construct(GoalRepository $goalRepository)
    {
        $this->goalRepository = $goalRepository;
    }

    public function getGoalsByUser()
    {
        return $this->goalRepository->getAllGoals(Auth::id());
    }

    public function search($keyword)
    {   
        return $this->goalRepository->searchByKeyword($keyword);
    }

    public function getCompletedGoalsByUser()
    {
        return $this->goalRepository->getDoneGoals(Auth::id());
    }

    public function getGoalById($id)
    {
        return $this->goalRepository->getGoalById(Auth::id(), $id);
    }

    public function createGoal($content)
    {
        $this->goalRepository->createGoal($content, Auth::id());
    }

    public function updateGoal($id, $content)
    {
        $this->goalRepository->updateGoal($id, $content, Auth::id());
    }

    public function updateGoalDoneStatus($id)
    {
        $this->goalRepository->updateGoalDoneStatus($id);
    }

    public function deleteGoal($id)
    {
        $this->goalRepository->deleteGoal($id);
    }
}