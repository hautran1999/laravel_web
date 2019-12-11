@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/myexam.css')}}">
<div class="container" style="height:500px">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center mt-5 mb-5">
        <form action="{{route('post_pass_exam',$name)}}" method="POST">
                @csrf
                <label style="float: left;">
                    <h6>Password Exam :</h6>
                </label>
                <input type="text" name="exam_password" class="form-control">
                <button type="submit" class="mt-2 btn btn-success">Check</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
@endsection