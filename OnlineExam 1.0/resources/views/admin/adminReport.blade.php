@extends('layouts.appAdmin')

@section('adminContent')
<div class="grid">
    <div class="grid-header">
        <h5>Report Manage</h5>
    </div>
    <div class="grid-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width:150x;" scope="col">User</th>
                    <th style="width:200px;"scope="col">Exam</th>
                    <th style="width:200px;"scope="col">Create Date</th>
                    <th style="width:200px;"scope="col">Report</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $r)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$r->name}}</td>
                    <td>{{$r->exam_name}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{$r->report}}</td>
                    <td>
                        <a href="#" class="btn btn-danger"><span><i class="fa fa-trash-o"></i></span>
                            Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection