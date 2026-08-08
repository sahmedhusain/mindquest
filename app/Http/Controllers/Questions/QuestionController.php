<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        // Check if there is an active (incomplete) quiz for this user
        $quiz = Quiz::where('user_id', $user->id)->where('completed', 0)->first();

        if (!$quiz) {
            $quiz = Quiz::create([
                'completed' => 0,
                'user_id' => $user->id,
            ]);

            $categories = ['History', 'Art', 'Geography', 'Science', 'Sports'];
            foreach ($categories as $cat) {
                // Get 4 random questions from each category
                $query_questions = Question::inRandomOrder()->where('category', $cat)->limit(4)->get();
                foreach ($query_questions as $qq) {
                    $quiz->questions()->attach($qq->id);
                }
            }
        }

        // Load questions with their answers and shuffle them
        $questions = $quiz->questions()->with('answers')->get()->shuffle();
        $quiz->setRelation('questions', $questions);

        return view('questions.list', ['quiz' => $quiz]);
    }

    public function results(Request $request, Quiz $quiz)
    {
        // Prevent submitting an already completed quiz or a quiz belonging to another user
        if ($quiz->completed || $quiz->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        $answers = $request->all();
        $quiz->completed = 1;

        $results = [
            'overall' => 0,
            'art' => 0,
            'geography' => 0,
            'history' => 0,
            'science' => 0,
            'sports' => 0
        ];
        $categoryTotals = [
            'art' => 0, 'geography' => 0, 'history' => 0,
            'science' => 0, 'sports' => 0
        ];
        $xp = 0;
        $totalQuestions = 0;

        foreach ($answers as $key => $value) {
            if (is_numeric($key)) {
                $totalQuestions++;
                $question = Question::find($key);
                if (!$question) continue;

                $catKey = strtolower($question->category);
                if (array_key_exists($catKey, $categoryTotals)) {
                    $categoryTotals[$catKey]++;
                }

                $correct_answer = Answer::where('question_id', $key)->where('correct', 1)->first();
                if ($correct_answer && (string)$correct_answer->id === (string)$value) {
                    $results['overall']++;
                    if (array_key_exists($catKey, $results)) {
                        $results[$catKey]++;
                    }
                    $xp += $question->xp;
                }
            }
        }

        $user = Auth::user();

        // Update XP
        $user->xp += $xp;

        // Update category stats (correct/total)
        foreach ($results as $key => $value) {
            if ($key !== 'overall') {
                $score = $user->$key ?: '0/0';
                [$correct, $total] = explode('/', $score);
                $user->$key = ($correct + $value) . '/' . ($total + 4);
            }
        }

        $user->save();
        $quiz->save();

        $results['total'] = $totalQuestions;
        $results['category_totals'] = $categoryTotals;

        return redirect()->route('quiz.results')->with('results', $results);
    }

    public function showResults()
    {
        $results = session('results');
        if (!$results) {
            return redirect()->route('home');
        }

        return view('questions.results', ['results' => $results]);
    }
}
