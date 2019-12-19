<?php

namespace App\Http\Controllers;


use App\Question;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application exam list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getRandom()
    {
        return view('random');
    }
    public function getRandomExam(Request $request)
    {
        $time = $request->exam_time * 60;
        $number = $request->exam_number;
        $kind = $request->exam_kind;
        $exam = Question::join('exam', 'quest.exam_id', '=', 'exam.exam_id')->select('exam_kind', 'question', 'answer', 'rightAnswer')->where('exam_kind', '=', $kind)->inRandomOrder()->limit($number)->get();
        // echo '<pre>'; print_r($quest); echo '</pre>';
        $right = [];
        $quest = [];
        foreach ($exam as $ex) {
            $arr = [
                'question' => $ex['question'],
                'answers' => explode('***', $ex['answer']),
            ];
            array_push($quest, $arr);
            array_push($right, $ex['rightAnswer']);
        }
        session()->put('right', $right);
        return view('randomExam', ['quest' => $quest, 'time' => $time]);
    }
    public function getResultExam(Request $request)
    {
        $answer = explode(',', $request->score);

        $number = 0;
        $true = 0;
        foreach (session()->get('right') as $ex) {
            if ($ex == $answer[$number]) {
                $true++;
            }
            $number++;
        }
        $scores =  round((($true * 10) / $number) * 100) / 100;

        session()->forget('right');


        return view('showScore', ['scores' => $scores, 'true' => $true, 'number' => $number]);
    }
}
