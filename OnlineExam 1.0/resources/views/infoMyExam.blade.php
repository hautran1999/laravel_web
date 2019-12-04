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
                    <div style="height:300px">
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
                                <p>10p</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="grid">
                <div class="grid-header">
                    <h5></h5>
                </div>
                <div class="grid-body">
                    <div style="height:300px">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="grid">
                <div class="grid-header">
                    <p>Chart</p>
                </div>
                <div class="grid-body">
                    <div style="height:200px"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="grid">
                <div class="grid-header">
                    <p>List scores</p>
                </div>
                <div class="grid-body">
                    <div style="height:200px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection