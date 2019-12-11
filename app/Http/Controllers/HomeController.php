<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            if(session()->has(Auth::user()->id)){
                return view('continueExam',['name'=>session()->get(Auth::user()->id)['exam_name']]);
            }
            else{
                return view('home');
            }
        }
        else{
            return view('home');
        }
    }
    
    public function postCheckIndex(Request $request){
        if($request->check == 'yes'){
            $name = session()->get(Auth::user()->id)['exam_name'];
            $id = session()->get(Auth::user()->id)['exam_id'];
            return redirect('/exam/test/password/'.$name.'&&'.$id);
        }
        else{
            session()->forget(Auth::user()->id);
            return redirect('/home');
        }
    }
    public function reIndex(){
        return redirect('/home');
    }
    public function getMessenger($messenger){
        return view('messenger',['messenger'=>$messenger]);
    }
}
