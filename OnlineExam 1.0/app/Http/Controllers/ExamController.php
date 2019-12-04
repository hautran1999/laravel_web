<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
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
    public function getExamList()
    {
        $exam = Exam::join('users', 'exam.id', '=', 'users.id')->select('exam_id', 'exam_name', 'exam_describe', 'exam.created_at', 'exam.id', 'name')->get();
        return view('examList', ['exam' => $exam, 'i' => 1]);
    }
    public function getInfoExam()
    {
        return view('404');
    }
    public function getReportExam()
    {
        return view('404');
    }

    public function getExam($name)
    {
        $id = explode('&&', $name)[1];
        $quest = [];
        $exam = Question::where('exam_id', '=', $id)->get();
        foreach ($exam as $ex) {
            $arr = [
                'question' => $ex['question'],
                'answers' => explode('***', $ex['answer']),
            ];
            array_push($quest, $arr);
        }
        return view('exam', ['quest' => $quest, 'info' => $id]);
    }
    public function postExam(Request $request, $name)
    {
        $answer = explode(',', $request->score);
        $exam = Question::where('exam_id', '=', $name)->select('rightAnswer')->get();
        $number = 0;
        $true = 0;
        foreach ($exam as $ex) {
            if ($ex['rightAnswer'] == $answer[$number]) {
                $true++;
            }
            $number++;
        }
        $scores = $true * 100 / $number;
        return view('showScore', ['scores' => $scores, 'true' => $true, 'number' => $number]);
    }
}
