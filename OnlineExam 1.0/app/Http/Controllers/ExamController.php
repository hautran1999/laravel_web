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

    public function getExam($name)
    {
        $id = explode('&&', $name)[1];
        $quest = [];
        $exam = Question::where('exam_id', '=', $id)->get();
        foreach ($exam as $ex) {
            $arr = [
                'question' => $ex['question'],
                'answers' => explode('***', $ex['answer']),
                'correctAnswer' => $ex['rightAnswer']
            ];
            array_push($quest, $arr);
        }
        return view('exam', ['quest' => $quest]);
    }
}
