<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\Scores;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checksession');
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
    public function getPasswordExam($name)
    {
        return view('passwordExam', ['name' => $name]);
    }
    public function postPasswordExam($name, Request $request)
    {
        $id = explode('&&', $name);
        $info = Exam::where('exam_id', '=', $id[1])->select('exam_password')->first();
        if ($info['exam_password'] == md5($request->exam_password)) {
            return redirect(route('test_exam', $name));
        } else {
            return view('404');
        }
    }
    public function getExam($name, Request $request)
    {
        if (session()->has(Auth::user()->id)) {
            $id = session()->get(Auth::user()->id)['exam_id'];
            $info = Exam::where('exam_id', '=', $id)->first();
            $quest = [];
            $exam = Question::where('exam_id', '=', $id)->get();
            foreach ($exam as $ex) {
                $arr = [
                    'question' => $ex['question'],
                    'answers' => explode('***', $ex['answer']),
                ];
                array_push($quest, $arr);
            }
            $time = session()->get(Auth::user()->id)['time'];
            $data = explode(' ',session()->get(Auth::user()->id)['data']);
            
            return view('exam', ['quest' => $quest, 'info' => $info, 'time' => $time, 'data' => $data]);
        } 
        else {
            $id = explode('&&', $name);
            $info = Exam::where('exam_id', '=', $id[1])->first();
            $data = [];
            $quest = [];
            $exam = Question::where('exam_id', '=', $id[1])->get();
            foreach ($exam as $ex) {
                $arr = [
                    'question' => $ex['question'],
                    'answers' => explode('***', $ex['answer']),
                ];
                array_push($quest, $arr);
                array_push($data,'null');
            }
            $time = $info['exam_time']*60;
            
            return view('exam', ['quest' => $quest, 'info' => $info, 'time' => $time, 'data' => $data]);
        }
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
        $scores =  round((($true * 10) / $number) * 100) / 100;
        $arr = [
            'scores' => $scores,
            'id' => Auth::user()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'exam_id' => $name,

        ];
        Scores::insert($arr);

        return view('showScore', ['scores' => $scores, 'true' => $true, 'number' => $number]);
    }
    public function postSaveResultExam(Request $request)
    {

        $arr = [
            'exam_id' => $request->exam_id,
            'exam_name' => $request->exam_name,
            'time' => explode(' : ', $request->time)[0] * 60 + explode(' : ', $request->time)[1],
            'data' => implode(' ', $request->data),
        ];
        $request->session()->put(Auth::user()->id, $arr);
    }
}
