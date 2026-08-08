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

    public static function getRank($xp)
    {
        if ($xp < 1500) {
            return 'Quiz Aprentice';
        } elseif ($xp < 5000) {
            return 'Average Quizer';
        } elseif ($xp < 10000) {
            return 'Epic Quizer';
        } else {
            return 'Quiz Master';
        }
    }

    public function index()
    {
        $user = Auth::user();

        $rank = self::getRank($user->xp);

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
