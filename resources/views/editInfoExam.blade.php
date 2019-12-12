@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/myexam.css')}}">
<div class="container mt-4">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="grid">
                <div class="grid-body">
                    <form action="{{route('postedit_info',$id)}}" method="POST">
                        @csrf
                        <h2 class="pt-2 pb-2 text-center">Update exam</h2>

                        <label style="float: left;">
                            <h6>Name Exam :</h6>
                        </label>
                        <input type="text" name="exam_name" class="form-control">
                        <label style="float: left;">
                            <h6>Password Exam :</h6>
                        </label>
                        <input type="text" name="exam_password" class="form-control">
                        <label style="float: left;">
                            <h6>Describe Exam:</h6>
                        </label>
                        <textarea class="form-control" name="exam_describe"></textarea>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="float: left;">
                                    <h6>Exam Time :</h6>
                                </label>
                                <input type="text" name="exam_time" class="form-control">
                            </div>
                            
                        </div>
                        <button type="submit" class="btn clever-btn mt-4 mb-4 bg-dark text-white">Update
                            Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection