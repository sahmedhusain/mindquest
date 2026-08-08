<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // Calculate rank based on XP thresholds
        $xp = $user->xp;
        if ($xp < 1500) {
            $rank = 'Quiz Aprentice';
        } elseif ($xp < 5000) {
            $rank = 'Average Quizer';
        } elseif ($xp < 10000) {
            $rank = 'Epic Quizer';
        } else {
            $rank = 'Quiz Master';
        }

        // Parse category scores
        $categories = ['art', 'geography', 'history', 'science', 'sports'];
        $stats = [];

        foreach ($categories as $cat) {
            $score = $user->$cat ?: '0/0';
            [$correct, $total] = explode('/', $score);
            $percentage = $total > 0 ? round(($correct / $total) * 100) : 0;
            $stats[$cat] = [
                'correct' => $correct,
                'total' => $total,
                'percentage' => $percentage
            ];
        }

        return view('profile', [
            'user' => $user,
            'rank' => $rank,
            'art' => $stats['art'],
            'geography' => $stats['geography'],
            'history' => $stats['history'],
            'science' => $stats['science'],
            'sports' => $stats['sports']
        ]);
    }
}
