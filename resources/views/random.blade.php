@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container pt-4 mt-4 pb-4 mb-4">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <div class="grid">
                <div class="grid-header text-center">
                    <h5>Exam info</h5>
                </div>
                <div class="grid-body">
                    <form action="{{route('random_exam')}}" method="POST">
                        @csrf
                        <div class="container">
                            <div>
                                <label for="">
                                    <h6>Number Question :</h6>
                                </label>
                                <input type="number" name="exam_number" class="form-control" required>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <label style="float: left;">
                                        <h6>Exam Time :</h6>
                                    </label>
                                    <input type="text" name="exam_time" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label style="float: left;">
                                        <h6>Subjects :</h6>
                                    </label>
                                    <select name="exam_kind" class="form-control">
                                        <option>Math</option>
                                        <option>Physical</option>
                                        <option>Chemistry</option>
                                        <option>Biological</option>
                                        <option>History</option>
                                        <option>Geography</option>
                                        <option>Literary</option>
                                        <option>Different</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn clever-btn mt-4 mb-4 bg-success text-white">Start
                                Exam</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection