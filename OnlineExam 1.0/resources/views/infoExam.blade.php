@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="container">
    <div class="text-center header-text mt-4">
        <h1>{{$info['exam_name']}}</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>Exam infomation</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Name : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_name']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Describe : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_describe']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Created At : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['created_at']}}</p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Exam Time : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p>{{$info['exam_time']}}p</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="grid">
                <div class="grid-header">
                    <h5>Infomation of list user</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Number User : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Max Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Min Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                        <div class="row showcase_row_area">
                            <div class="col-sm-4 showcase_content_area text-right">
                                <p>Medium Score : </p>
                            </div>
                            <div class="col-sm-8 showcase_content_area">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div>
            <div class="grid">
                <div class="grid-header">
                    <h5>List scores</h5>
                </div>
                <div class="grid-body">
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Create Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $list)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->scores}}</td>
                                    <td>{{$list->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection