<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('xp', 'desc')->limit(10)->get();

        // Calculate total correct answers for each user
        $categories = ['art', 'geography', 'history', 'science', 'sports'];
        foreach ($users as $user) {
            $totalCorrect = 0;
            foreach ($categories as $cat) {
                $score = $user->$cat ?: '0/0';
                $totalCorrect += (int) explode('/', $score)[0];
            }
            $user->total_correct = $totalCorrect;
        }

        return view('leaderboard', ['users' => $users]);
    }
}
