@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/examList.css')}}">
<div class="container ">
    <div class="text-center header-text mb-4 mt-4">
        <h1>Exam list</h1>
    </div>
    <div class="grid">
        <div class="grid-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th style="width:200px;" scope="col">Exam</th>
                        <th scope="col">Subject</th>
                        <th style="width:300px;" scope="col">Describe</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exam as $ex)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            <span>{{$ex->exam_name}}</span><br>
                            <small>{{$ex->name}}</small>
                        </td>
                        <td>{{$ex->exam_kind}}</td>
                        <td>{{$ex->exam_describe}}</td>
                        <td>{{$ex->created_at}}</td>
                        <td>
                            <a href="{{route('pass_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"
                                class="btn btn-success"><span><i class="fa fa-graduation-cap"></i></span>
                                Test</a>
                            <a href="{{route('info_exam',$ex->exam_name.'&&'.$ex->exam_id)}}" class="btn btn-info"><span><i
                                        class="fa fa-bar-chart"></i></span>
                                Info</a>
                            <a href="{{route('report',$ex->exam_name.'&&'.$ex->exam_id)}}"
                                class="btn btn-danger"><span><i class="fa fa-exclamation-circle"></i></span>
                                Report</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection