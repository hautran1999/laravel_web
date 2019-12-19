@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/examList.css')}}">
<div class="container ">
    <div class="text-center header-text mb-4 mt-4">
        <h1>Search Exam</h1>
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
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <a href="{{route('pass_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                            type="button" class="btn btn-success"><i
                                                class="fa fa-graduation-cap"></i></button><br>
                                        <p class="text-center">Test</p>
                                    </a>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <a href="{{route('info_exam',$ex->exam_name.'&&'.$ex->exam_id)}}"><button
                                            type="button" class="btn btn-info"><i
                                                class="fa fa-bar-chart"></i></button><br>
                                        <p class="text-center">Info</p>
                                    </a>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <a href="{{route('report',$ex->exam_name.'&&'.$ex->exam_id)}}"><button type="button"
                                            class="btn btn-danger"><i class="fa fa-exclamation-circle"></i></button><br>
                                        <p class="text-center">Report</p>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection