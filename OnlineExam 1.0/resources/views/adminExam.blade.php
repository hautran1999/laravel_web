@extends('layouts.appAdmin')

@section('adminContent')
<div class="grid">
    <div class="grid-header">
        <h5>Exam Manage</h5>
    </div>
    <div class="grid-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th style="width:200px;" scope="col">Exam</th>
                    <th style="width:100px;" scope="col">Subject</th>
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
                        <a href="#" class="btn btn-success"><span><i class="fa fa-edit"></i></span>
                            Edit</a>
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