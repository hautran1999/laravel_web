<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\ReportExam;
use App\Scores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    /**
     * Show the application exam list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAdmin()
    {
        
            $user = User::get();
            $exam = Exam::get();
            $quest = Question::get();
            // $score = Scores::get();
            $report = ReportExam::get();
            // echo '<pre>';
            // print_r($user);
            // echo '</pre>';
            return view('adminDashBoard', ['user' => $user, 'exam' => $exam, 'quest' => $quest, 'report' => $report]);
        
    }
    public function getUserAdmin()
    {
        $user = User::get();
        return view('adminUser', ['user' => $user, 'i' => 1]);
    }
    public function getExamAdmin()
    {
        $exam = Exam::join('users', 'exam.id', '=', 'users.id')->select('exam_id', 'exam_name', 'exam_kind', 'exam_describe', 'exam.created_at', 'exam.id', 'name')->get();
        return view('adminExam', ['exam' => $exam, 'i' => 1]);
    }
    public function getQuestionAdmin()
    {
        
        $quest = Question::join('exam', 'quest.exam_id', '=', 'exam.exam_id')->select('exam.exam_id','exam_kind','quest_id','question','answer','rightAnswer')->get();
        return view('adminQuestion', ['quest' => $quest, 'i' => 1]);
    }
    public function getScoresAdmin()
    {
        $scores = Scores::join('users', 'scores.id', '=', 'users.id')->join('exam', 'scores.exam_id', '=', 'exam.exam_id')->select('scores', 'name', 'exam_name', 'scores.created_at', 'exam.exam_id', 'users.id')->orderBy('exam.exam_id', 'asc')->get();
        return view('adminScores', ['scores' => $scores, 'i' => 1]);
    }
    public function getReportAdmin()
    {
        $report = ReportExam::join('users', 'report.id', '=', 'users.id')->join('exam', 'report.exam_id', '=', 'exam.exam_id')->select('report', 'name', 'exam_name', 'report.created_at', 'exam.exam_id', 'users.id')->get();
        return view('adminReport', ['report' => $report, 'i' => 1]);
        // echo '<pre>';
        // print_r($report);
        // echo '</pre>';
    }
}
