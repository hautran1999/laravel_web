<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
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
    public function getAdmin()
    { 
        if(Auth::user()->level==1){
            return view('layouts.appAdmin');
        }
        else {
            $messenger = 'You need to Admin account to continue';
            return redirect(route('messenger',$messenger));
        }
    }
}
