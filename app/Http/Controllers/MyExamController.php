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
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMyExam()
    {

        $exam_created = Exam::join('users', 'exam.id', '=', 'users.id')->select('exam_id', 'exam_name', 'exam_kind', 'exam_describe', 'exam.created_at', 'exam.id', 'name', 'running')->where('exam.id', '=', Auth::user()->id)->get();
        $exam_running = Exam::join('users', 'exam.id', '=', 'users.id')->select('exam_id', 'exam_name', 'exam_kind', 'exam_describe', 'exam.created_at', 'exam.id', 'name', 'running')->where('exam.id', '=', Auth::user()->id)->where('running', '=', 1)->get();
        $exam_join = Exam::join('scores', 'exam.exam_id', '=', 'scores.exam_id')->select('exam.exam_id', 'exam.exam_name', 'exam_kind', 'exam.exam_describe', 'exam.created_at', 'scores.id', 'running')->where('scores.id', '=', Auth::user()->id)->distinct()->get();
        return view('myExam', ['exam_created' => $exam_created, 'exam_join' => $exam_join, 'exam_running' => $exam_running, 'i' => 1, 'j' => 1, 'run' => 1]);
    }
    public function searchCreateMyExam(Request $request)
    {
        
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
            'running' => 0,
            'exam_kind' => $request->input('exam_kind')
        ];
        Exam::insert($arr);
        $info = Exam::where($arr)->first();
        $str = '/myexam/createexam/' . Auth::user()->id . '&&' . $info->exam_name . '&&' . $info->exam_id;

        return redirect($str);
    }
    public function runExam($id)
    {
        Exam::where('exam_id', '=', $id)->update(['running' => 1]);
        return redirect('/myexam');
    }

    public function stopExam($id)
    {
        Exam::where('exam_id', '=', $id)->update(['running' => 0]);
        return redirect('/myexam');
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
                'rightAnswer' => $question[2]
            ];
            Question::insert($arr);
        }
        Exam::where('exam_id', '=', $request->input('exam_id'))->update(['running' => 1]);
        return redirect('/myexam');
    }

    public function getInfoExam($id)
    {
        $number = Question::where('exam_id', '=', explode('&&', $id)[1])->count();
        $score = Scores::where('exam_id', '=', explode('&&', $id)[1])->select('scores')->get();
        //echo '<pre>'; print_r($score); echo '</pre>';
        //$score[4]['scores'];;
        $info = Exam::where('exam_id', '=', explode('&&', $id)[1])->first();
        $list = Scores::join('users', 'scores.id', '=', 'users.id')->select('scores', 'exam_id', 'scores.created_at', 'name')->where('exam_id', '=', explode('&&', $id)[1])->get();
        return view('infoMyExam', ['info' => $info, 'list' => $list, 'number' => $number, 'scores' => $score, 'i' => 1]);
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
        Scores::where('exam_id', '=', $id)->delete();
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
        Exam::where('exam_id', '=', $id)->update(['running' => 1]);
        return redirect('/myexam');
    }
    public function getEditInfo($id)
    {
        return view('editInfoExam', ['id' => $id]);
    }
    public function postEditInfo($id, Request $request)
    {
        $id = explode('&&', $id)[1];

        Exam::where('exam_id', '=', $id)->update(['running' => 1]);
        if ($request->exam_name != '') {
            Exam::where('exam_id', '=', $id)->update(['exam_name' => $request->exam_name]);
        };
        if ($request->exam_password != '') {
            Exam::where('exam_id', '=', $id)->update(['exam_password' => $request->exam_password]);
        };
        if ($request->exam_describe != '') {
            Exam::where('exam_id', '=', $id)->update(['exam_describe' => $request->exam_describe]);
        };
        if ($request->exam_time != '') {
            Exam::where('exam_id', '=', $id)->update(['exam_time' => $request->exam_time]);
        };

        return redirect('/myexam');
    }
}
