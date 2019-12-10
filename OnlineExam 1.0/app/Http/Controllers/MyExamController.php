<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\Scores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyExamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checksession');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMyExam()
    {
        $exam = Exam::join('users', 'exam.id', '=', 'users.id')->select('exam_id', 'exam_name', 'exam_describe', 'exam.created_at', 'exam.id', 'name')->where('exam.id', '=', \Auth::user()->id)->get();
        return view('myExam', ['exam' => $exam, 'i' => 1]);
    }
    public function postMyExam(Request $request)
    {
        $arr = [
            'exam_name' => $request->exam_name,
            'exam_password' => md5($request->exam_password),
            'exam_describe' => $request->exam_describe,
            'id' => Auth::user()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'exam_time' => $request->exam_time,
            'exam_kind' => $request->input('exam_kind')
        ];
        Exam::insert($arr);
        $info = Exam::where($arr)->first();
        $str = '/myexam/createexam/' . Auth::user()->id . '&&' . $info->exam_name . '&&' . $info->exam_id;

        return redirect($str);
    }
    public function deleteExam($id)
    {
        Exam::where('exam_id', '=', $id)->delete();
        Question::where('exam_id', '=', $id)->delete();
        Scores::where('exam_id', '=', $id)->delete();
        return redirect('/myexam');
    }
    public function getCreateExam($name)
    {
        $info = explode('&&', $name);
        if ($info[0] == Auth::user()->id) {
            return view('createExam', ['info' => $info]);
        } else {
            return view('404');
        }
    }
    public function postCreateExam(Request $request)
    {
        foreach ($request->input('question') as $question) {
            $arr = [
                'exam_id' => $request->input('exam_id'),
                'question' => $question[0],
                'answer' => implode('***', $question[1]),
                'rightAnswer' => implode(' ', $question[2])
            ];
            Question::insert($arr);
        }
        return redirect('/myexam');
    }
    public function getInfoExam($id)
    {

        $info = Exam::where('exam_id', '=', explode('&&', $id)[1])->first();
        $list = Scores::join('users', 'scores.id', '=', 'users.id')->select('scores', 'exam_id', 'scores.created_at', 'name')->where('exam_id', '=', explode('&&', $id)[1])->get();
        return view('infoMyExam', ['info' => $info, 'list' => $list, 'i' => 1]);
    }
    public function getEditExam($id)
    {
        $name = explode('&&', $id);
        $info = Exam::where('exam_id', '=', $name[1])->first();

        $quest = [];
        $exam = Question::where('exam_id', '=', $name[1])->get();
        foreach ($exam as $ex) {
            $arr = [
                'question' => $ex['question'],
                'answers' => explode('***', $ex['answer']),
                'true' => $ex['rightAnswer']
            ];
            array_push($quest, $arr);
        }
        return view('editExam', ['quest' => $quest, 'info' => $info]);
    }
    public function postEditExam(Request $request, $id)
    {
        Question::where('exam_id', '=', $id)->delete();
        foreach ($request->input('question') as $question) {
            $arr = [
                'exam_id' => $id,
                'question' => $question[0],
                'answer' => implode('***', $question[1]),
                'rightAnswer' => implode(' ', $question[2])
            ];
            Question::insert($arr);
        }
        return redirect('/myexam');
    }
}
