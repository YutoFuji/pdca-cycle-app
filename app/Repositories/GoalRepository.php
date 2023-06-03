<?php

namespace App\Repositories;

use App\Models\Goal;

class GoalRepository
{
    public function getAllGoals($userId)
    {
        return Goal::where('user_id', $userId)->get();
    }

    public function searchByKeyword($keyword)
    {
        if (!empty($keyword)) {
            Goal::where('content', 'LIKE', "%{$keyword}%")->get();
        }
    }

    public function getDoneGoals($userId)
    {
        return Goal::where('user_id', $userId)->where('done', true)->get();
    }

    public function getGoalById($userId, $id)
    {
        return Goal::where('user_id', $userId)->where('id', $id)->firstOrFail();
    }

    public function createGoal($content, $userId)
    {
        Goal::create([
            'content' => $content,
            'user_id' => $userId,
        ]);
    }

    public function updateGoal($id, $content, $userId)
    {
        $goal = Goal::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $goal->content = $content;
        $goal->save();
    }

    public function updateGoalDoneStatus($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->done = !$goal->done;
        $goal->save();
    }

    public function deleteGoal($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
    }

    
}