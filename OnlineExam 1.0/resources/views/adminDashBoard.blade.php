@extends('layouts.appAdmin')

@section('adminContent')
<div class="row">
    <div class="col-sm-3">
        <div class="grid your-user">
            <div class="grid-body">
                <h5>User</h5>
                <p>{{count($user)}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="grid your-exam">
            <div class="grid-body">
                <h5>Exam</h5>
                <p>{{count($exam)}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="grid your-question">
            <div class="grid-body">
                <h5>Question</h5>
                <p>{{count($quest)}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="grid your-report">
            <div class="grid-body">
                <h5>Report</h5>
                <p>{{count($report)}}</p>
            </div>
        </div>
    </div>
</div>
@endsection